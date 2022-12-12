<?php

use Lib\Data\Repository\BillionaireRepository;
use Lib\Domain\Scraping;

require_once __DIR__.'/../vendor/autoload.php';


$data = new BillionaireRepository();
echo $data->all();