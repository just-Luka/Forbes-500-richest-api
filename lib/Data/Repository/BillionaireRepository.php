<?php

namespace Lib\Data\Repository;

use Lib\Configs\AppConfig;
use Lib\Data\Billionaires\IBillionaire;
use Lib\Data\Billionaires\LocalBillionaire;
use Lib\Data\Billionaires\RemoteBillionaire;

class BillionaireRepository {
    /**
     * Cache name
     * @var string
     */
    private string $cache = AppConfig::DEFAULT_CACHE_PATH.'billionaire.json';

    /**
     * Method manages logic and defines whether data should be received from network or cache
     * @return string
     */
    public function all()
    {
        $hour24 = 60*60*24;
        if(file_exists($this->cache) && (time() - filemtime($this->cache) <=  $hour24)) {
            return (new LocalBillionaire())->data();
        }

        $data = (new RemoteBillionaire())->data();
        file_put_contents($this->cache, $data);
        
        return $data;
    }
}