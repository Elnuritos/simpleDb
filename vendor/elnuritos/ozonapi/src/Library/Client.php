<?php

namespace Ozon\Library;

use Ozon\Abstracts\Entity;
use Ozon\Exceptions\InValidRequestException;


class Client
{

    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    private $baseUrl;



    public function __construct(string $hostName)
    {
        $this->baseUrl = $hostName;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Выполнение базового запроса
     *
     * @param string $method Метод
     * @param string $url
     * @param string $params
     * @param array $headers
     *
     * @return Entity
     */
    public function request(string $method, string $url, string $params = '', array $headers = []): Entity
    {
        $responseHeaders = [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        if (
            self::METHOD_POST === $method
            || self::METHOD_PUT === $method
            || self::METHOD_DELETE === $method
            || self::METHOD_GET === $method
        ) {
            if (empty($headers)) {
                $headers[] = 'Content-Type: application/json';
                $headers[] = 'Cache-Control: no-cache';
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        if (self::METHOD_GET === $method && !empty($params)) {
            $url .= '?' . $params;
        }
        if (self::METHOD_POST === $method) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        if (self::METHOD_PUT === $method) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }
        if (self::METHOD_DELETE === $method) {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        }
        curl_setopt(
            $ch,
            CURLOPT_HEADERFUNCTION,
            function ($ch, $header) use (&$responseHeaders) {
                unset($ch);
                if (substr_count($header, ':')) {
                    list($key, $value) = explode(':', $header, 2);
                    $responseHeaders[$key] = trim($value);
                } else {
                    $responseHeaders[] = trim($header);
                }
                $responseHeaders = array_filter($responseHeaders);
                return strlen($header);
            }
        );
        curl_setopt($ch, CURLOPT_URL, $url);

        $response = curl_exec($ch);

        $info = curl_getinfo($ch);
        $errno = curl_errno($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($errno) {
            throw new InValidRequestException($error, $errno);
        }
        return new Entity(
            $info['http_code'],
            json_decode($response, true),
            "OK",
            $responseHeaders
        );
    }

    /**
     * Выполнение запроса на добавление сущности
     * @param string $url
     * @param array $data
     * @return Entity
     */
    public function executeCreateRequest(string $url, array $data,$headers): Entity
    {

        $response = $this->request(
            self::METHOD_POST,
            $url,
            json_encode($data),
            $headers
            
        );
        if ($response->getHttpCode() != 201) {
            $errorMessage = $response->getData();
            if (is_array($errorMessage)) {
                $errorMessage = current($errorMessage);
                if (isset($errorMessage[0])) {
                    $response->setMessage($errorMessage[0]);
                }
            }
        }
        return $response;
    }

    /**
     * Выполнение запроса на удаление сущности
     * @param string $url
     * @param $id
     * @return Entity
     */
    public function executeRemoveRequest(string $url, $id): Entity
    {
        $response = $this->request(
            self::METHOD_DELETE,
            $url
        );
        if (404 == $response->getHttpCode()) {
            $response->setMessage("Запись '$id' не найдена.'");
        }
        return $response;
    }

    /**
     * Выполнение запроса на получение списка сущностей
     * @param string $url
     * @param array $params
     * @return Entity
     */
    public function executeListRequest(string $url, array $params = []): Entity
    {
        $response = $this->request(
            self::METHOD_GET,
            $url,
            http_build_query($params)
        );

        if ($response->getHttpCode() != 200) {
            $errorMessage = $response->getData();
            if (is_array($errorMessage)) {
                $errorMessage = current($errorMessage);
                $response->setMessage($errorMessage);
            }
        }
        return $response;
    }

    /**
     * Выполнение запроса на получение сущности
     * @param string $url
     * @param $id
     * @param array $params
     * @return Entity
     */
    public function executeGetRequest(string $url, $id, array $params = []): Entity
    {
        $response = $this->request(
            self::METHOD_GET,
            $url,
            http_build_query($params)
        );
        if (!$response->getData()) {
            $response->setHttpCode(404);
            $response->setMessage("Запись '$id' не найдена.'");
        }

        return $response;
    }

    /**
     * Выполнение запроса на обновление сущности
     * @param string $url
     * @param array $data
     * @return Entity
     */
    public function executeUpdateRequest(string $url, array $data): Entity
    {
        $response = $this->request(
            self::METHOD_PUT,
            $url,
            json_encode($data)
        );
        if ($response->getHttpCode() != 200) {
            $errorMessage = $response->getData();
            if (is_array($errorMessage)) {
                $errorMessage = current($errorMessage);
                $response->setMessage($errorMessage);
            }
        }
        return $response;
    }
}
