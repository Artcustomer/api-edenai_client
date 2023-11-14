<?php

namespace Artcustomer\EdenAIClient\Connector;

use Artcustomer\ApiUnit\Client\AbstractApiClient;
use Artcustomer\ApiUnit\Connector\AbstractConnector;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\ApiUnit\Utils\ApiMethodTypes;
use Artcustomer\EdenAIClient\Http\InfoRequest;
use Artcustomer\EdenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class InfoConnector extends AbstractConnector
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
    public function listProviderSubfeatures(array $params = []): IApiResponse
    {
        $data = [
            'method' => ApiMethodTypes::GET,
            'endpoint' => ApiEndpoints::PROVIDER_SUBFEATURES
        ];
        $request = $this->client->getRequestFactory()->instantiate(InfoRequest::class, [$data]);

        return $this->client->executeRequest($request);
    }
}
