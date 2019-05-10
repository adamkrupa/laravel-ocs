<?php


namespace Krupa\LaravelOCS;


use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Nimbusoft\Flysystem\OpenStack\SwiftAdapter;
use OpenStack\OpenStack;
use Storage;

class OCSServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('ocs', function($app, $config) {
            $ocs = new OpenStack([
                'authUrl' => 'https://ocs-pl.oktawave.com/auth/v3',
                'region'  => 'PL',
                'user'    => [
                    'id'       => $config['user'],
                    'password' => $config['password']
                ],
                'scope' => [
                    'project' => [
                        'id' => $config['project']
                    ]
                ]
            ]);

            return new Filesystem(new SwiftAdapter($ocs->objectStoreV1()->getContainer($config['container'])));
        });
    }
}