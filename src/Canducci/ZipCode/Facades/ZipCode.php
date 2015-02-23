<?php namespace Canducci\ZipCode\Facades {

	use Illuminate\Support\Facades\Facade;

	class ZipCode extends Facade
	{
		protected static function getFacadeAccessor()
		{
			return 'Canducci\ZipCode\ZipCode';
		}
	}
}