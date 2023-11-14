<?php

namespace Artcustomer\EdenAIClient\Client;

use Artcustomer\ApiUnit\Client\CurlApiClient;
use Artcustomer\EdenAIClient\Factory\Decorator\ResponseDecorator;
use Artcustomer\EdenAIClient\Http\ApiRequest;
use Artcustomer\EdenAIClient\Utils\ApiInfos;
use Artcustomer\EdenAIClient\Utils\ApiTools;

/**
 * @author David
 */
class ApiClient extends CurlApiClient
{

    /**
     * @param array $params
     * @param bool $useDecorator
     */
    public function __construct(array $params, bool $useDecorator = false)
    {
        parent::__construct($params);

        if ($useDecorator) {
            $this->responseDecoratorClassName = ResponseDecorator::class;
            $this->responseDecoratorArguments = [ApiTools::CONTENT_TYPE_OBJECT];
        }

        $this->enableListeners = true;
        $this->enableEvents = false;
        $this->enableMocks = false;
        $this->debugMode = false;
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        $this->init();
        $this->checkParams();
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array $query
     * @param $body
     * @param array $headers
     * @return void
     */
    protected function preBuildRequest(string $method, string $endpoint, array $query = [], $body = null, array $headers = []): void
    {
        $this->requestClassName = ApiRequest::class;
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function checkParams(): void
    {
        $requiredParams = ['protocol', 'host', 'version'];

        foreach ($requiredParams as $param) {
            if (!isset($this->apiParams[$param])) {
                $this->isOperational = false;
            }
        }

        if (!$this->isOperational) {
            throw new \Exception(sprintf('%s : Missing params', ApiInfos::API_NAME), 500);
        }
    }
}
