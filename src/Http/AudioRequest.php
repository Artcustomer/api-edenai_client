<?php

namespace Artcustomer\EdenAIClient\Http;

use Artcustomer\EdenAIClient\Utils\ApiEndpoints;

/**
 * @author David
 */
class AudioRequest extends ApiRequest
{

    /**
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct();

        $this->initParams();
        $this->hydrate($data);
        $this->extendParams();
    }

    /**
     * @return void
     */
    protected function buildUri(): void
    {
        $this->uri = sprintf('%s/%s', $this->uriBase, ApiEndpoints::AUDIO);

        if (!empty($this->endpoint)) {
            $this->uri = sprintf('%s/%s', $this->uri, $this->endpoint);
        }
    }

    /**
     * @return void
     */
    protected function buildHeaders(): void
    {
        parent::buildHeaders();

        $this->headers['Accept'] = 'application/json';
    }

    /**
     * @return void
     */
    private function initParams(): void
    {
        $this->body = $this->body ?? [];
    }

    /**
     * Extend parameters
     *
     * @return void
     */
    private function extendParams(): void
    {

    }
}
