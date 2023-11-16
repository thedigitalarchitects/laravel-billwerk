<?php

namespace Tda\LaravelBillwerk;

use Tda\LaravelBillwerk\Trait\Endpoints;


class Billwerk
{

    use Endpoints;

    protected string $endpoint = '';
    protected string $method;
    protected Client $client;
    protected bool $isSandbox = false;
    protected ?string $client_id;
    protected ?string $client_secret;
    protected array $params;
    protected string $error;
    protected bool $isFailed = false;


    public function __construct(?string $client_id = null, ?string $client_secret = null)
    {
        $this->client_id = $client_id ?? config('billwerk.client_id');
        $this->client_secret = $client_secret ?? config('billwerk.client_secret');
    }

    public function isSandbox(): void
    {
        $this->isSandbox = true;
    }

    public function get(): array
    {
        return $this->call(Client::METHOD_GET);
    }

    public function create(array $params): array
    {
        $this->params = $params;
        return $this->call(Client::METHOD_POST);
    }

    public function replace(array $params): array
    {
        $this->params = $params;
        return $this->call(Client::METHOD_PUT);
    }

    public function update(array $params): array
    {
        $this->params = $params;
        return $this->call(Client::METHOD_PATCH);
    }

    public function delete(): array
    {
        return $this->call(Client::METHOD_DELETE);
    }

    public function call(string $method): array
    {
        $this->loadClient();
        try {
            return $this->client->call($method, $this->endpoint, $this->params ?? []) ?? [];
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            $this->isFailed = true;
            return [];
        }
    }

    public function showError(): ?array
    {
        return [
            'error'     => $this->error ?? '',
            'endpoint'  => $this->endpoint,
            'params'    => $this->params ?? ''
        ];
    }

    public function filter(array $params): self
    {
        $this->params = $params;
        return $this;
    }

    protected function loadClient(): void
    {
        if(!isset($this->client)) {
            $this->client = new Client(
                $this->client_id,
                $this->client_secret,
                $this->isSandbox
            );
        }
    }

    public function isFailed(): bool
    {
        return $this->isFailed;
    }

}
