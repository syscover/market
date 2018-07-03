<?php namespace Syscover\Market\Old;

use Illuminate\Support\ServiceProvider;

class MarketServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// include route.php file
		if (!$this->app->routesAreCached())
			require __DIR__ . '/../../routes.php';

		// register views
		$this->loadViewsFrom(__DIR__ . '/../../views', 'market');

        // register translations
        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'market');

		// register public files
		$this->publishes([
			__DIR__ . '/../../../public' 					=> public_path('/packages/syscover/market')
		]);

		// register config files
		$this->publishes([
			__DIR__ . '/../../config/market.php' 			=> config_path('market.php')
		]);

        // register migrations
        $this->publishes([
            __DIR__ . '/../../database/migrations/' 		=> base_path('/database/migrations'),
			__DIR__ . '/../../database/migrations/updates/' => base_path('/database/migrations/updates'),
        ], 'migrations');

        // register migrations
        $this->publishes([
            __DIR__ . '/../../database/seeds/' 				=> base_path('/database/seeds')
        ], 'seeds');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        //
	}
}