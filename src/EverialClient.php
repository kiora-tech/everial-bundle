<?php

namespace Kiora\EverialBundle;

use Kiora\EverialBundle\Message\Recognize;
use Kiora\EverialClientInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class EverialClient implements EverialClientInterface
{
    private EverialClientInterface $client;
    private MessageBusInterface $messageBus;

    public function __construct(EverialClientInterface $client, MessageBusInterface $messageBus)
    {
        $this->client = $client;
        $this->messageBus = $messageBus;
    }

    public function auth(): ResponseInterface
    {
        return $this->client->auth();
    }

    public function serialize(\SplFileObject $file): ResponseInterface
    {
        return $this->client->serialize($file);
    }

    public function recognize(\SplFileObject $file): ResponseInterface
    {
        $response = $this->client->recognize($file);
        $this->messageBus->dispatch(new Recognize($file, $response->toArray()));

        return $response;
    }

    public function analyse(\SplFileObject $file, string $radId, string $dbId): ResponseInterface
    {
        return $this->client->analyse($file, $radId, $dbId);
    }
}
