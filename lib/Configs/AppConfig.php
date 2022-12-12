<?php

namespace Lib\Configs;

final class AppConfig {
    /**
     * URL address for fetching list of billionaires
     */
    const URL = 'https://www.bloomberg.com/billionaires/';
    /**
     * PATH address where data caches
     */
    const DEFAULT_CACHE_PATH = __DIR__ . '/../../caches/';
}