<?php

namespace Football\FootballData;

use App;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class FootballDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('football', function () {
            $client = new Client([
                'base_uri' => 'http://api.football-data.org/v2/',
                'headers' => [
                    'X-Auth-Token' => getenv('FootballData_API_KEY'),
                    'X-Response-Control' => 'full',
                ]
            ]);
            return new FootballData($client);
        });
    }
}
