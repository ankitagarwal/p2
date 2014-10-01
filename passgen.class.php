<?php

/**
 * This file contains the class responsible for genrating passwords.
 *
 * @copyright  2014 onwards Ankit Agarwal
 */

class passgen {

    /**
     * @var array A list of errors found.
     */
    protected $errors = array();

    /**
     * @var int word count.
     */
    protected $wordcount;

    /**
     * @var int symbol count.
     */
    protected $symbolcount;

    /**
     * @var int number count.
     */
    protected $numbercount;

    /**
     * @var int formatting count.
     */
    protected $formatting;

    /**
     * Construct method.
     */
    public function __construct() {
        // Get word count.
        $wordcount = get_param_from_post('wordcount');
        $wordcount = $wordcount ? $wordcount : WORDS_DEFAULT; // Set default value if not supplied by user.
        if (!validate_param($wordcount)) {
            $this->errors['wordcount'] = 'Invalid word count supplied.';
        } else {
            $wordcount = clean_param($wordcount);
            if ($wordcount > WORDS_MAX || $wordcount < 1) {
                $this->errors['wordcount'] = 'Invalid word count supplied.';
            }
        }
        $this->wordcount = $wordcount;

        // Get symbols count.
        $symbolcount = get_param_from_post('symbolcount');
        $symbolcount = $symbolcount ? $symbolcount : SYMBOLS_DEFAULT; // Set default value if not supplied by user.
        if (!validate_param($symbolcount)) {
            $this->errors['symbolcount'] = 'Invalid symbol count supplied.';
        } else {
            $symbolcount = clean_param($symbolcount);
            if ($symbolcount > SYMBOLS_MAX || $symbolcount < 0) {
                $this->errors['symbolcount'] = 'Invalid symbol count supplied.';
            }
        }
        $this->symbolcount = $symbolcount;

        // Get number count.
        $numbercount = get_param_from_post('numbercount');
        $numbercount = $numbercount ? $numbercount : NUMBERS_DEFAULT; // Set default value if not supplied by user.
        if (!validate_param($numbercount)) {
            $this->errors['numbercount'] = 'Invalid number count supplied.';
        } else {
            $numbercount = clean_param($numbercount);
            if ($numbercount > NUMBERS_MAX || $numbercount < 0) {
                $this->errors['numbercount'] = 'Invalid number count supplied.';
            }
        }
        $this->numbercount = $numbercount;

        // Get formatting options.
        $formatting = get_param_from_post('formatting');
        $formatting = $formatting ? $formatting : 1; // Set default value if not supplied by user.
        if (!validate_param($formatting)) {
            $this->errors['formatting'] = 'Invalid formatting supplied.';
        } else {
            $formatting = clean_param($formatting);
            if ($formatting > 3 || $formatting < 1) {
                $this->errors['formatting'] = 'Invalid formatting supplied.';
            }
        }
        $this->formatting = $formatting;
    }

    /**
     * wrapper to return errors.
     *
     * @return array Errors
     */
    public function get_errors() {
        return $this->errors;
    }

    /**
     * Return an imploded list of errors seaprated by <br>
     * @return string
     */
    public function get_errors_html() {
        $html = '';
        foreach ($this->errors as $error) {
            $html .= $error . "<br />";
        }
        return $html;
    }

    /**
     * generate and return password.
     *
     * @return string
     */
    public function generate_password() {
        $wordlist = self::get_words();
        $words = array();
        $password = '';
        for($i = 0; $i < $this->wordcount ; $i++) {
            $rand = rand(0, count($wordlist) - 1);
            $words[] = $wordlist[$rand];
        }

        array_walk($words, 'self::get_formatted_word');

        // Generate the extra password part containing symbols and numbers.
        $extrapart = '';
        for($i = 0 ; $i < $this->symbolcount; $i++) {
            $rand = rand(34, 47); // Ascii range of special chars.
            $extrapart .= chr($rand);
        }
        for($i = 0 ; $i < $this->numbercount; $i++) {
            $extrapart .= rand(0, 9);
        }
        if (!empty($extrapart)) {
            $words[] = $extrapart;
        }

        return implode('-', $words);
    }

    /**
     * This methods formats the word list by reference based on the formatting options.
     *
     * @param string $word , a word to format.
     */
    protected function get_formatted_word(&$word) {
        switch($this->formatting) {
            case 1 :
                // All lower case.
                $word = strtolower($word);
                return;
            case 2:
                // All uper case.
                $word = strtoupper($word);
                return;
            case 3;
                // Camel casing.
                $word = ucfirst($word);
                return;

            default:
                // Nothing to do.
        }
    }

    /**
     * Magic get method.
     *
     * @param $prop
     *
     * @return mixed
     * @throws Exception
     */
    public function __get($prop) {
        if ($prop == 'wordcount' || $prop == 'symbolcount' || $prop == 'numbercount' || $prop == 'formatting') {
            return $this->$prop;
        }
        throw new Exception("Invalid property: $prop");
    }

    /**
     * Get words list from our cached list.
     *
     * @return array|mixed
     */
    protected static function get_words() {
        if ($cont = file_get_contents('wordlist')) {
            if ($words = json_decode($cont)) {
                return $words;
            }
        }

        return array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten'); // Just in case.
    }
}