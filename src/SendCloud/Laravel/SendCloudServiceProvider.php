<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/12/4
 * Time: 下午1:26
 */

namespace SendCloud\Laravel;

use SendCloud\SendCloud;
use SendCloud\SendCloudSMS;
use Illuminate\Support\ServiceProvider;

class SendCloudServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('sendcloud', function ($app) {
            $config = $app->make('config')->get('sendcloud');
            return new SendCloud($config['user'], $config['key']);
        });
        $this->app->singleton('sendcloudsms', function ($app) {
            $config = $app->make('config')->get('sendcloudsms');
            return new SendCloudSMS($config['user'], $config['key']);
        });
    }
}
