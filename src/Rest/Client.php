<?php
/**
 *
 * http://api.dotmailer.com/v2/help/wadl
 * http://www.dotmailer.co.uk/api/more_about_api/api_error_codes.aspx
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api\Rest;

use RestClient\Exception;
use RestClient\Request;

/**
 * Class Rest
 *
 * Bridge class providing the IClient interface.
 *
 * @package DotMailer\Api
 */
class Client implements IClient
{

    /** @var \RestClient\Client */
    private $restClient;

    public function __construct($username, $password)
    {

        $this->restClient = new \RestClient\Client(array(
            Request::BASE_URL_KEY => 'https://api.dotmailer.com/v2',
            Request::USERNAME_KEY => $username,
            Request::PASSWORD_KEY => $password,
            Request::USER_AGENT_KEY => 'romanpitak/dotmailer-api-v2-php-client',
            Request::HEADERS_KEY => array(
                'Content-Type' => 'application/json'
            ),
            Request::CURL_OPTIONS_KEY => array(
                CURLOPT_SSL_VERIFYPEER => false
            ),
        ));

    }

    private static function getExceptionMessage($responseBodyString, $returnCode = null)
    {
        switch ((int)$returnCode) {
            case 404:
                return 'NOT FOUND';
            default:
                $decoded = json_decode($responseBodyString, true);
                if (is_array($decoded) && isset($decoded['message'])) {
                    return $decoded['message'];
                }
                return $responseBodyString;
        }
    }

    public function execute($param_arr, $responses = array())
    {

        // when only url is supplied
        if (is_string($param_arr)) {
            $param_arr = array($param_arr);
        }

        // get request
        $callback = array($this->restClient, 'newRequest');
        /** @var Request $request */
        $request = call_user_func_array($callback, $param_arr);

        // get response
        try {
            $response = $request->getResponse();
        } catch (Exception $e) {
            throw new RestClientException();
        }

        /*
         * process response
         */

        // get return code
        $returnCode = $response->getInfo()->http_code;

        // is there a special action to be done?
        if (isset($responses[$returnCode])) {
            return call_user_func($responses[$returnCode], $response);
        }

        // default response processing
        switch ((int)$returnCode) {
            case 200:
            case 201:
            case 202:
                return $response->getParsedResponse();
                break;
            case 204: // no content
                return null;
            case 400:
                throw new BadRequestException(self::getExceptionMessage($response->getParsedResponse(), 400));
            case 401:
                throw new UnauthorizedException(self::getExceptionMessage($response->getParsedResponse(), 401));
            case 404:
                throw new NotFoundException(self::getExceptionMessage($response->getParsedResponse(), 404));
            case 409:
                throw new ConflictException(self::getExceptionMessage($response->getParsedResponse(), 409));
            default:
                throw new Exception(self::getExceptionMessage($response->getParsedResponse(), $returnCode));
        }
    }


}
