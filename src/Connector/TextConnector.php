<?php

namespace Artcustomer\EdenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\EdenAIClient\Http\TextRequest;
use Artcustomer\EdenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class TextConnector extends AbstractConnector
{

    /**
     * @param AbstractApiClient $client
     */
    public function __construct(AbstractApiClient $client)
    {
        parent::__construct($client, false);
    }

    /**
     * @param array $params
     * @return IApiResponse
     */
    public function chat(array $params = []): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::CHAT,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(TextRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
