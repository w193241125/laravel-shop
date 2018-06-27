<?php

namespace App\Providers;

use Monolog\Logger;
use Yansongda\Pay\Pay;
use App\Models\UserAddress;
use App\Policies\UserAddressPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        UserAddress::class => UserAddressPolicy::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     * $this->app->singleton() 往服务容器中注入一个单例对象
     * app()->environment() 获取当前运行的环境，线上环境会返回 production
     * 对于支付宝，如果项目运行环境不是线上环境，则启用开发模式，并且将日志级别设置为 DEBUG。
     * 由于微信支付没有开发模式，所以仅仅将日志级别设置为 DEBUG。
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        // 往服务容器中注入一个名为 alipay 的单例对象
        $this->app->singleton('alipay', function () {
            $config = config('pay.alipay');
//            $config['notify_url'] = route('payment.alipay.notify');
            $config['notify_url'] = 'http://requestbin.fullcontact.com/1asv2cv1';
            $config['return_url'] = route('payment.alipay.return');

            // 判断当前项目运行环境是否为线上环境
            if (app()->environment() !== 'production') {
                $config['mode']         = 'dev';
                $config['log']['level'] = Logger::DEBUG;
            } else {
                $config['log']['level'] = Logger::WARNING;
            }
            // 调用 Yansongda\Pay 来创建一个支付宝支付对象
            return Pay::alipay($config);
        });

        //往服务容器中注入 wechat_pay 的单例对象
        $this->app->singleton('wechat_pay', function () {
            $config = config('pay.wechat');
            if (app()->environment() !== 'production') {
                $config['log']['level'] = Logger::DEBUG;
            } else {
                $config['log']['level'] = Logger::WARNING;
            }
            // 调用 Yansongda\Pay 来创建一个微信支付对象
            return Pay::wechat($config);
        });
    }
}
