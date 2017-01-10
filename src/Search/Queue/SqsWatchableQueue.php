<?php

namespace eLife\Search\Queue;

use Aws\Sqs\SqsClient;

final class SqsWatchableQueue implements WatchableQueue
{
    private $client;
    private $url;
    private $pollingTimeout = 20;
    private $visibilityTimeout = 10;

    public function __construct(SqsClient $client, string $name)
    {
        $this->client = $client;
        $this->url = $client->getQueueUrl(['QueueName' => $name])->get('QueueUrl');
    }

    /**
     * Adds item to the queue.
     */
    public function enqueue(QueueItem $item)
    {
        $this->client->sendMessage([
            'QueueUrl' => $this->url,
            'MessageBody' => json_encode([
                'type' => $item->getType(),
                'id' => $item->getId(),
            ]),
        ]);
    }

    /**
     * Get an item from the queue and start is processing,
     * making it invisible to other processes for $timeoutOverride seconds.
     */
    public function dequeue()
    {
        $message = $this->client->receiveMessage([
            'QueueUrl' => $this->url,
            'WaitTimeSeconds' => $this->pollingTimeout,
            'VisibilityTimeout' => $this->visibilityTimeout,
        ])->toArray();

        if (!SqsMessageTransformer::hasItems($message)) {
            return false;
        }

        return SqsMessageTransformer::fromMessage($message);
    }

    /**
     * Commits to removing item from queue, marks item as done and processed.
     */
    public function commit(QueueItem $item)
    {
        $this->client->deleteMessage([
            'QueueUrl' => $this->url,
            'ReceiptHandle' => $item->getReceipt(),
        ]);
    }

    public function clean()
    {
        $this->client->purgeQueue([
            'QueueUrl' => $this->url,
        ]);
    }

    public function count() : int
    {
        $attributes = [
            'ApproximateNumberOfMessages',
            'ApproximateNumberOfMessagesDelayed',
            'ApproximateNumberOfMessagesNotVisible',
        ];
        $result = $this->client->getQueueAttributes([
            'AttributeNames' => $attributes,
            'QueueUrl' => $this->url,
        ]);
        $total = 0;
        foreach ($attributes as $attributeName) {
            $total += $result['Attributes'][$attributeName];
        }

        return $total;
    }
}
