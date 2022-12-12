<?php

namespace Lib\Data\Billionaires;

use GuzzleHttp\Client;
use Lib\Configs\AppConfig;
use Lib\Domain\Scraping;

class RemoteBillionaire implements IBillionaire {
    use Scraping;
    
    /**
     * Returns Billionaires list from network
     * @return string
     */
    public function data() 
    {
        return $this->extract($this->fetchHTML());
    }

    /**
     * Makes GET requests on server
     * TODO check for reponse, try...catch()
     * @return string
     */
    private function fetchHTML()
    {
        return (new Client())->request('GET', AppConfig::URL)->getBody()->getContents();;
    }
}