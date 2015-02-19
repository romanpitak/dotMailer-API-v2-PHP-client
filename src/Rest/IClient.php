<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\Rest;

interface IClient
{

    /**
     * @param string $username API username (email)
     * @param string $password API password
     */
    public function __construct($username, $password);

    /**
     * Execute a REST request
     *
     * Execute a request according to the parameters specified in the $param_arr.
     *
     * @param array $param_arr array(string $url, string $method = 'GET', string|array $data = null, array $headers = array())
     * @param array $responses
     * @return string
     */
    public function execute($param_arr, $responses = array());

}
