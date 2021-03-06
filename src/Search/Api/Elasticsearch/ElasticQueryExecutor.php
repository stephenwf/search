<?php

namespace eLife\Search\Api\Elasticsearch;

use eLife\Search\Api\Query\QueryBuilder;
use eLife\Search\Api\Query\QueryExecutor;
use eLife\Search\Api\Query\QueryResponse;

class ElasticQueryExecutor implements QueryExecutor
{
    private $client;
    private $query;

    public function __construct(ElasticsearchClient $client, QueryBuilder $query = null)
    {
        $this->client = $client;
        $this->query = $query;
    }

    public function setQuery(QueryBuilder $query)
    {
        $this->query = $query;
    }

    public function getHash() : string
    {
        return sha1(json_encode($this->query->getQuery()));
    }

    public function execute() : QueryResponse
    {
        return $this->client->searchDocuments($this->query->getRawQuery());
    }
}
