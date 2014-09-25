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
            $this->errors['wordcount'] = 'Invalid word count supplied';
        } else {
            $wordcount = clean_param($wordcount);
            if ($wordcount > WORDS_MAX || $wordcount < 1) {
                $this->errors['wordcount'] = 'Invalid word count supplied';
            }
        }
        $this->wordcount = $wordcount;

        // Get symbols count.
        $symbolcount = get_param_from_post('symbolcount');
        $symbolcount = $symbolcount ? $symbolcount : SYMBOLS_DEFAULT; // Set default value if not supplied by user.
        if (!validate_param($symbolcount)) {
            $this->errors['symbolcount'] = 'Invalid symbol count supplied';
        } else {
            $symbolcount = clean_param($symbolcount);
            if ($symbolcount > SYMBOLS_MAX || $symbolcount < 0) {
                $this->errors['symbolcount'] = 'Invalid symbol count supplied';
            }
        }
        $this->symbolcount = $symbolcount;

        // Get symbols count.
        $numbercount = get_param_from_post('numbercount');
        $numbercount = $numbercount ? $numbercount : NUMBERS_DEFAULT; // Set default value if not supplied by user.
        if (!validate_param($numbercount)) {
            $this->errors['numbercount'] = 'Invalid number count supplied';
        } else {
            $numbercount = clean_param($numbercount);
            if ($numbercount > NUMBERS_MAX || $numbercount < 0) {
                $this->errors['numbercount'] = 'Invalid number count supplied';
            }
        }
        $this->numbercount = $numbercount;

        // Get formatting options.
        $formatting = get_param_from_post('formatting');
        $formatting = $formatting ? $formatting : 1; // Set default value if not supplied by user.
        if (!validate_param($formatting)) {
            $this->errors['formatting'] = 'Invalid formatting supplied';
        } else {
            $formatting = clean_param($formatting);
            if ($formatting > 3 || $formatting < 1) {
                $this->errors['formatting'] = 'Invalid formatting supplied';
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
}