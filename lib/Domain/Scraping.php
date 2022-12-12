<?php

namespace Lib\Domain;

trait Scraping {
    /**
     * Based on keyword, we are finding correct class</> to extract
     * data from the website
     * @var string
     */
    private $keyword = 'window.top500';

    /**
     * Method performs extraction from html. Scraps data and returns as json
     * @param mixed $html
     * @return string
     */
    private function extract($html): string 
    {
        $result = '';
        $index = strpos($html, $this->keyword);

        if(!$index) {
            echo "Error, Script has been modifed on server";
            return '';
        }

        $begin = false;
        while($html[$index] !== ']'){
            if($begin){
                $result .= $html[$index];
            }
            else if($html[$index] === '['){
                $begin = true;
            }
            $index++;
        };

        return '['.$result.']';
    }
}