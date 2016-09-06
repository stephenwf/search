<?php

namespace eLife\Search\Api;

use eLife\ApiClient\ApiClient\BlogClient;
use eLife\ApiClient\ApiClient\SubjectsClient;
use eLife\ApiClient\HttpClient\Guzzle6HttpClient;
use eLife\ApiSdk\Client\BlogArticles;
use eLife\ApiSdk\Client\Subjects;
use eLife\ApiSdk\Model\BlogArticle;
use eLife\Search\Api\Query\MockQueryBuilder;
use eLife\Search\Api\Response\ArticleResponse\PoaArticle;
use eLife\Search\Api\Response\BlogArticleResponse;
use eLife\Search\Api\Response\SearchResponse;
use GuzzleHttp\Client;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController
{
    private $serializer;

    public function __construct(Serializer $serializer, SerializationContext $context)
    {
        $this->serializer = $serializer;
        $this->context = $context;
    }

    public function blogApiAction()
    {
        // To test locally change the variables below.
        $localApiUrl = 'http://192.168.187.56:1242';
        // Create article thing.
        $articles = new BlogArticles(
            new BlogClient(
                new Guzzle6HttpClient(
                    new Client(['base_uri' => $localApiUrl])
                )
            ),
            new Subjects(
                new SubjectsClient(
                    new Guzzle6HttpClient(
                        new Client(['base_uri' => $localApiUrl])
                    )
                )
            )
        );
        // Loop
        foreach ($articles as $article) {
            // Prompt some PStorm auto-complete
            if ($article instanceof BlogArticle) {
                // Get the title
                echo $article->getTitle().'<br/>';
                // var_dump($article->getContent()->toArray());
            }
        }

        return '';
    }

    public function searchTestAction(Request $request)
    {
        $for = $request->query->get('for', '');
        $order = $request->query->get('order', 'desc');
        $page = $request->query->get('page', 1);
        $perPage = $request->query->get('per-page', 10);
        // $sort = $request->query->get('sort');
        $subjects = $request->query->get('subject');
        $types = $request->query->get('type');

        $query = new MockQueryBuilder();

        $query = $query
            ->searchFor($for)
            ->paginate($page, $perPage)
            ->order($order)
        ;

        if ($subjects) {
            $query->whereSubjects($subjects);
        }
        if ($subjects) {
            $query->whereType($types);
        }

        $data = $query->getQuery()->execute();

        $result = $this->responseFromArray(SearchResponse::class, ['items' => $data]);

        return $this->serialize($result);
    }

    public function indexAction()
    {
        return $this->serialize(new SearchResponse([
            new PoaArticle(),
            new PoaArticle(),
        ]), 1);
    }

    private function serialize($data, int $version = null, $group = null)
    {
        $context = $this->context;
        if ($version) {
            $context->setVersion($version);
        }
        if ($group) {
            $context->setGroups([$group]);
        }
        $headers = [];
        $json = $this->serializer->serialize($data, 'json', $context);
        if ($data instanceof HasHeaders) {
            $headers = $data->getHeaders();
        }

        return new Response($json, 200, $headers);
    }

    public function blogArticleAction()
    {
        $blog = $this->responseFromArray(BlogArticleResponse::class, [
            'id' => '123',
            'title' => 'testing title',
        ]);

        return $this->serialize(new SearchResponse([
            $blog,
            $blog,
            $blog,
        ]), 1);
    }

    private function responseFromArray($className, $data)
    {
        return $this->serializer->deserialize(json_encode($data), $className, 'json');
    }
}
