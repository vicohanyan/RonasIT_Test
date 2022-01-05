<?php

namespace App\Services;

/**
 * Class Curl
 * @package App\Services
 */
class Curl
{
    /**
     * Build curl request
     *
     * @param string $url
     * @param string $method
     * @param array $params
     * @param array $headers
     * @return resource
     */
    private function buildRequest(string $url, string $method = 'GET', array $params = [], array $headers = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge([
            'Accept: application/json',
            'Content-Type: application/json',
        ], $headers));

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }
        if ($method === 'DELETE') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }
        return $ch;
    }

    /**
     * Handle request and return array response
     *
     * @param $ch
     * @return array
     */
    private function handleRequest($ch): array
    {
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    /**
     * Handle request and return array response
     *
     * @param $ch
     * @return string
     */
    private function handleFileRequest($ch): string
    {
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    /**
     * Get request for download file
     *
     * @param string $url
     * @param array $params
     * @param array $headers
     * @return string
     */
    public function getFile(string $url, array $params = [], array $headers = []): string
    {
        $url = $url . '?' . http_build_query($params);
        return $this->handleFileRequest(
            $this->buildRequest($url, 'GET', $params, $headers)
        );
    }

    /**
     * Custom get request
     *
     * @param string $url
     * @param array $params
     * @param array $headers
     * @return array
     */
    public function get(string $url, array $params = [], array $headers = []): array
    {
        $url = $url . '?' . http_build_query($params);
        return $this->handleRequest(
            $this->buildRequest($url, 'GET', $params, $headers)
        );
    }

    /**
     * Custom post request
     *
     * @param string $url
     * @param array $params
     * @param array $headers
     * @return array
     */
    public function post(string $url, array $params = [], array $headers = []): array
    {
        return $this->handleRequest(
            $this->buildRequest($url, 'POST', $params, $headers)
        );
    }

    /**
     * Custom delete request
     *
     * @param string $url
     * @param array $params
     * @param array $headers
     * @return array
     */
    public function delete(string $url, array $params = [], array $headers = []): array
    {
        return $this->handleRequest(
            $this->buildRequest($url, 'DELETE', $params, $headers)
        );
    }
}
