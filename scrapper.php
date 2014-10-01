<?php

/**
 * This file contains the class responsible for scrapping words.
 *
 * @copyright  2014 onwards Ankit Agarwal
 */

class scrapper {

    CONST URL = "http://www.paulnoll.com/Books/Clear-English/words-01-02-hundred.html";

    /**
     * Scrape and generate word list.
     */
    public static function scrape_words() {
        $fulllist = array();
        for($i = 1; $i < 30; $i = $i + 2) {
            $url = self::URL;
            $replace = ($i < 10) ? '0' . $i : $i;
            $url = str_replace('01', $replace, $url);
            $replace = (($i+1) < 10) ? '0' . ($i+1) : ($i+1);
            $url = str_replace('02', $replace, $url);
            echo $url . PHP_EOL;

            if ($cont = file_get_contents($url)) {
                // Got content now parse.
                preg_match_all('$<li>(.*?)<.li>$msi', $cont, $words);
                if (!empty($words[1])) {
                    $words = $words[1];
                    array_walk($words, 'self::trim');
                    $fulllist = array_merge($fulllist, $words);
                }
            };
        }
        return $fulllist;
    }

    /** Trim by reference
     * */
    public static function trim(&$str) {
        $str = trim($str);
    }
}