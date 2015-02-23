<?php namespace {
    if (!function_exists('zipcode')) {
        /**
         * @param string $value
         *
         * @return \Canducci\ZipCode\Contracts\ZipCodeServiceContract
         */
        function zipcode($value)
        {
            return app('zipcode')->find($value);
        }
    }
}
