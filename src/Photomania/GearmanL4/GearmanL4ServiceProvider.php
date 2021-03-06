<?php namespace Photomania\GearmanL4;

use GearmanClient;
use Illuminate\Support\ServiceProvider;

class GearmanL4ServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('photomania/gearman-l4');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton(
			'gearman.client',
			function ($app) {
				$gearmanClient = new GearmanClient();
				$servers = $app['config']->get('gearman-l4::servers');

				foreach ($servers as $server) {
					$gearmanClient->addServer($server['host'], isset($server['port']) ? $server['port']: 4730);
				}

				return $gearmanClient;
			}
		);

		// Alias the class name itself to the instance, for IoC resolving through Reflection.
		$this->app->singleton('GearmanClient', 'gearman.client');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('gearman.client');
	}

}
