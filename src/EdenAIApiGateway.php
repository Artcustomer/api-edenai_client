<?php

namespace Artcustomer\EdenAIClient;

use Artcustomer\ApiUnit\Gateway\AbstractApiGateway;
use Artcustomer\ApiUnit\Http\IApiResponse;
use Artcustomer\EdenAIClient\Client\ApiClient;
use Artcustomer\EdenAIClient\Connector\AudioConnector;
use Artcustomer\EdenAIClient\Connector\InfoConnector;
use Artcustomer\EdenAIClient\Connector\TextConnector;
use Artcustomer\EdenAIClient\Utils\ApiInfos;

/**
 * @author David
 */
class EdenAIApiGateway extends AbstractApiGateway
{

    private AudioConnector $audioConnector;
    private InfoConnector $infoConnector;
    private TextConnector $textConnector;

    private string $apiKey;

    /**
     * @param string $apiKey
     * @throws \ReflectionException
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->defineParams();

        parent::__construct(ApiClient::class, [$this->params]);
    }

    /**
     * @return void
     */
    public function initialize(): void
    {
        $this->setupConnectors();

        $this->client->initialize();
    }

    /**
     * Test API
     *
     * @return IApiResponse
     */
    public function test(): IApiResponse
    {
        return $this->infoConnector->listProviderSubfeatures();
    }

    /**
     * @return AudioConnector
     */
    public function getAudioConnector(): AudioConnector
    {
        return $this->audioConnector;
    }

    /**
     * @return InfoConnector
     */
    public function getInfoConnector(): InfoConnector
    {
        return $this->infoConnector;
    }

    /**
     * @return TextConnector
     */
    public function getTextConnector(): TextConnector
    {
        return $this->textConnector;
    }

    /**
     * @return void
     */
    private function setupConnectors(): void
    {
        $this->audioConnector = new AudioConnector($this->client);
        $this->infoConnector = new InfoConnector($this->client);
        $this->textConnector = new TextConnector($this->client);
    }

    /**
     * @return void
     */
    private function defineParams(): void
    {
        $this->params['api_name'] = ApiInfos::API_NAME;
        $this->params['api_version'] = ApiInfos::API_VERSION;
        $this->params['protocol'] = ApiInfos::PROTOCOL;
        $this->params['host'] = ApiInfos::HOST;
        $this->params['version'] = ApiInfos::VERSION;
        $this->params['api_key'] = $this->apiKey;
    }
}
