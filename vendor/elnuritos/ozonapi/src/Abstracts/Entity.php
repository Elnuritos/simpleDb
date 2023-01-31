<?php

namespace Ozon\Abstracts;


class Entity
{
    protected $httpCode;


    protected $headers;


    private $response;

    public function __construct($httpCode, $data = [], $message = null, $headers = [])
    {
        $this->httpCode = $httpCode;
        $this->headers = $headers;
        $this->response = [
            'data' => $data,
            'message' => $message
        ];
    }


    public function getResponse()
    {
        return $this->response;
    }

    public function getMessage(): string
    {
        return $this->response['message'];
    }

    public function isSuccessful()
    {
        return in_array(
            $this->httpCode,
            [201, 200]
        );
    }

    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->response['message'] = $message;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }

    public function getData()
    {
        return $this->response['data'];
    }

    public function setData($data)
    {
        $this->response['data'] = $data;
    }

    /**
     * @param int $httpCode
     */
    public function setHttpCode($httpCode)
    {
        $this->httpCode = $httpCode;
    }
}
