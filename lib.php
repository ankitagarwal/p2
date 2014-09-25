<?php

/**
 * This file contains various independent functions needed for the project.
 *
 * @copyright  2014 onwards Ankit Agarwal
 */

/**
 * For a given param type, clean the data and return it. This method can be extended to clean other params as need arises.
 *
 * @see config.php
 * @param mixed $data data to be cleaned.
 * @param int $type Type of parameter to be checked for, currently only supports PARAM_INTEGER.
 *
 * @return mixed
 */
function clean_param($data , $type = PARAM_INTEGER) {
    switch ($type) {
        case PARAM_INTEGER:
            return (int)$data;
        default:
            return $data;
    }
}

/**
 * For a given param type, verify if the data passed is of the same type or not.
 *
 * @see config.php
 * @param mixed $data data to be cleaned.
 * @param int $type Type of parameter to be checked for, currently only supports PARAM_INTEGER.
 *
 * @return bool true if validation is passed else false.
 */
function validate_param($data , $type = PARAM_INTEGER) {
    switch ($type) {
        case PARAM_INTEGER:
            return is_int($data);
        default:
            return false;
    }
}

/**
 * Gets a requested parameter from post request.
 *
 * @param string $param Name of the parameter
 * @param bool $required is this parameter required ?
 *
 * @return bool|mixed
 * @throws Exception if required is set to true and the param doesn't exist.
 */
function get_param_from_post($param, $required = false) {
    global $_POST;
    if (isset($_POST[$param])) {
        return $_POST[$param];
    }
    if ($required) {
        throw new Exception('Required parameter missing from post data - ' . $param);
    }
    return false;
}