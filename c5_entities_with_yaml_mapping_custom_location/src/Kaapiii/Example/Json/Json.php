<?php

namespace Kaapiii\Example\Json;

/**
 * Json base class
 * 
 * New Json Classes should extend from this class. 
 * This class provides methods for exposing cached and no cached json strings. 
 *
 * @author Markus Liechti <markus@liechti.io>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Json extends \Concrete\Core\Controller\Controller
{

    /**
     * Convert the data to a json array
     *
     * @param   integer $expires exipiration data for the cache header
     * @param   array   $data      Array with entity data
     * @return  json    string
     */
    protected function renderJson($data, $expires = 86400)
    {
        header('Content-Type: application/json; charset=utf-8');
        $this->setCacheHeaders($expires);
        echo json_encode($data);
    }

    /**
     * Convert the data to a json array and add no caching headers
     *
     * @param   array   $data      Array with entity data
     * @return  json    string
     */
    protected function renderJsonNoCaching($data)
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Expires: 0');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    /**
     * Convert the data to a json array
     *
     *
     * @param   array   $data      Array with entity data
     */
    protected function convertToJson($data)
    {
        return json_encode($data);
    }

    /**
     * Echo json array
     * This method doesn't convert the input data to json
     *
     * @param string $data json formated
     * @param integer $expires exipiration data for the cache header
     */
    protected function echoJson($data, $expires = 86400)
    {
        header('Content-Type: application/json; charset=utf-8');
        $this->setCacheHeaders($expires);
        echo $data;
    }

    /**
     * Echo json array and add no caching headers
     * This method doesn't convert the input data to json
     *
     * @param string $data json formated
     */
    protected function echoJsonNoCaching($data)
    {
        header('Content-Type: application/json; charset=utf-8');
        header('Expires: 0');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Content-Type: application/json; charset=utf-8');
        echo $data;
    }

    /**
     * Set Cache Headers
     * 
     * @param integer $expires
     * @param string|array $data
     */
    protected function setCacheHeaders($expires = 86400, $data = null)
    {

        header('Cache-Control: max-age=' . $expires); // must-revalidate
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');

        if (!empty($data)) {
            if (is_array($data)) {
                $dataString = json_encode($data);
            } else if (is_string($data)) {
                $dataString = $data;
            }
            header('ETag: ' . md5($dataString));
        }
    }

}
