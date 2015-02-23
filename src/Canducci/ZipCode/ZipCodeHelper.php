<?php namespace {
    if (!function_exists('zipcode')) {
        /**
         * @param $value
         * @return $this
         * @throws \Exception
         */
        function zipcode($value)
        {
            $zip_code = new Canducci\ZipCode\ZipCode();
            return $zip_code->find($value);
        }
    }
}
