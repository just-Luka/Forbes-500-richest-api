<?php

namespace Lib\Data\Billionaires;
use Lib\Configs\AppConfig;

class LocalBillionaire implements IBillionaire {
    
	 /**
     * Returns Billionaires list from cache
     * @return string
     */
	public function data() {
        return file_get_contents(AppConfig::DEFAULT_CACHE_PATH.'billionaire.json');
	}
}