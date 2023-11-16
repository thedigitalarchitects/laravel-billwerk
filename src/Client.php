<?php

namespace Tda\LaravelBillwerk;
use Exception;
use Http;


class Client
{

    protected string $base_url = 'https://{system}.billwerk.com/';
    protected string $api = 'api/v1/';
    protected string $token = '';
    public const METHOD_GET = 'get';
    public const METHOD_POST = 'post';
    public const METHOD_PUT = 'put';
    public const METHOD_PATCH = 'patch';
    public const METHOD_DELETE = 'delete';
    private const SYSTEM_APP = 'app';
    private const SYSTEM_SANDBOX = 'sandbox';


    public function __construct(string $client_id, string $client_secret, bool $sandbox = false)
    {
        $this->checkSandbox($sandbox);
        $this->token($client_id, $client_secret);
    }


    public function token(string $client_id, string $client_secret): ?string
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic ' . base64_encode( $client_id . ':' . $client_secret)
        ])
        ->post($this->base_url . 'oauth/token', [
            'grant_type' => 'client_credentials',
        ]);

        $return = json_decode($response->getBody(), true);

        if(isset($return['error']))
        {
            throw new Exception('Failed with message: ' . $return['error']);
        }

        $this->token = $return['access_token'];

        return $this->token;
    }

    public function call(string $method, string $endpoint, array $params = []): ?array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token
        ])->{$method}($this->base_url . $this->api . $endpoint, $params);

        $return = json_decode($response->getBody(), true);

        if(isset($return['Message']))
        {
            throw new Exception('Failed with message: ' . $return['Message']);
        }

        return $return;
    }

    protected function checkSandbox(bool $sandbox): void
    {
        $this->base_url = str_replace('{system}', ($sandbox) ? self::SYSTEM_SANDBOX : self::SYSTEM_APP, $this->base_url);
    }
}
