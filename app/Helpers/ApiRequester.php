<?php 
namespace App\Helpers;
use Exception;

use Illuminate\Support\Facades\Http;

class ApiRequester {
    protected $baseUrl;

    public function __construct($baseUrl) {
        $this->baseUrl = $baseUrl;
    }

    public function makeRequest($endpoint, $method, $headers = null, $body = null) {
        $url = $this->baseUrl . $endpoint;
        try {
            $http = Http::withOptions([]);
            if ($headers) {
                $http = $http->withHeaders($headers);
            }
            if ($body) {
                $http = $http->withBody($body)->getBody();
            }
            return $http->$method($url);
        } catch (Exception $e) {
            throw new Exception('Ocorreu um erro na requisição: ' . $e->getMessage());
        }
    }
}