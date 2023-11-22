<?php

namespace Tda\LaravelBillwerk;

use Tda\LaravelBillwerk\Trait\Endpoints;


class Billwerk
{

    use Endpoints;

    protected static string $endpoint = '';
    protected string $method;
    protected Client $client;
    protected static bool $isSandbox = false;
    protected static string $client_id;
    protected static string $client_secret;
    protected static array $params = [];
    protected static string $error;
    protected static bool $isFailed = false;


    public static function isSandbox(): void
    {
        self::$isSandbox = true;
    }

    public static function credentials(string $client_id, string $client_secret): void
    {
        self::$client_id = $client_id;
        self::$client_secret = $client_secret;
    }

    public function get(): array
    {
        return self::call(Client::METHOD_GET);
    }

    public function create(array $params): array
    {
        self::$params = array_merge(self::$params, $params);
        return self::call(Client::METHOD_POST);
    }

    public function replace(array $params): array
    {
        self::$params = array_merge(self::$params, $params);
        return self::call(Client::METHOD_PUT);
    }

    public function update(array $params): array
    {
        self::$params = array_merge(self::$params, $params);
        return self::call(Client::METHOD_PATCH);
    }

    public function delete(): array
    {
        return self::call(Client::METHOD_DELETE);
    }

    public function call(string $method): array
    {
        $this->loadClient();
        try {
            return $this->client->call($method, self::$endpoint, self::$params ?? []) ?? [];
        } catch (\Exception $e) {
            self::$error = $e->getMessage();
            self::$isFailed = true;
            return [];
        }
    }

    public static function showError(): ?array
    {
        return [
            'error'     => self::$error ?? '',
            'endpoint'  => self::$endpoint,
            'params'    => self::$params ?? ''
        ];
    }

    public static function isFailed(): bool
    {
        return self::$isFailed;
    }

    public function filter(array $params): self
    {
        self::$params = array_merge(self::$params, $params);
        return $this;
    }

    protected function loadClient(): void
    {
        $client_id = self::$client_id ?? config('billwerk.client_id');
        $client_secret = self::$client_secret ?? config('billwerk.client_secret');
        $isSandbox = self::$isSandbox ?? false;

        if(!isset(self::$client)) {
            $this->client = new Client(
                $client_id,
                $client_secret,
                $isSandbox
            );
        }
    }

}
