<?php namespace Canducci\ZipCode\Providers {

	use Illuminate\Support\ServiceProvider;

	class ZipCodeServiceProvider extends ServiceProvider
	{
		public function register()
		{
			$this->app->bind('Canducci\ZipCode\ZipCodeContracts','Canducci\ZipCode\ZipCode');
		}
	}
}