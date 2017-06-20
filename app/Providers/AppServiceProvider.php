<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 本地化Faker，汉化测试生成的数据
        // 目前只能部分汉化
        $this->app->singleton(FakerGenerator::class, function() {
            return FakerFactory::create('zh_CN');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Passport::ignoreMigrations();
    }
}
