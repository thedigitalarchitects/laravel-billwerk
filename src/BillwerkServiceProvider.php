<?php

namespace Tda\LaravelBillwerk;

use Illuminate\Support\ServiceProvider;

class BillwerkServiceProvider extends ServiceProvider
{
    public function registeringPackage()
    {
        $this->app->alias(Billwerk::class, 'laravel-billwerk');

    }
}
