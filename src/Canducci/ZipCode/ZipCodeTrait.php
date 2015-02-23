<?php namespace Canducci\ZipCode {

    trait ZipCodeTraits {
        /**
         * @param $value
         * @return $this
         */
        public function zipcode($value) {
            return zipcode($value);
        }
    }
}