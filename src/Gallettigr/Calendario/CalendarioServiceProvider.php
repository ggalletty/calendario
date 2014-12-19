<?php namespace Gallettigr\Calendario;

use Illuminate\Support\ServiceProvider;

class CalendarioServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['calendario'] = $this->app->share(function($app) {
      return new Calendario;
    });

    $this->app->booting(function() {
      $loader = \Illuminate\Foundation\AliasLoader::getInstance();
      $loader->alias('Calendario', 'Gallettigr\Calendario\Facades\Calendario');
    });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('calendario');
	}

}
