<?php namespace Canducci\ZipCode {

    trait ZipCodeTrait {
        /**
         * @param $value
         * @return $this
         */
        public function zipcode($value) {
            return zipcode($value);
        }
    }
}