<?php

namespace Artcustomer\EdenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\EdenAIClient\Http\AudioRequest;
use Artcustomer\EdenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class AudioConnector extends AbstractConnector
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
    public function textToSpeech(array $params = []): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::POST,
            'endpoint' => ApiEndpoints::TEXT_TO_SPEECH,
            'body' => $params
        ];
        $request = $this->client->getRequestFactory()->instantiate(AudioRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
