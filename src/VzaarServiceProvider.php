<?php

namespace Vkardaras\Vzaar;

use Illuminate\Support\ServiceProvider;

class VzaarServiceProvider extends ServiceProvider
{

	public function boot()
	{
		$this->loadRoutesFrom(__DIR__ . '/routes/web.php');
		$this->loadViewsFrom(__DIR__ . '/views', 'vzaar');
		$this->loadMigrationsFrom(__DIR__ . '/database/migrations');
		$this->mergeConfigFrom(
			__DIR__ . '/config/vzaar.php', 
			'vzaar'
		);

		$this->publishes([
			__DIR__ . '/config/vzaar.php' => config_path('vzaar.php'),
			__DIR__ . '/views' => resource_path('views/vendor/vzaar')
		]);
	}
	
	public function register()
	{
		
	}
}