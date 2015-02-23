<?php namespace Canducci\ZipCode {

    interface ZipCodeContracts {
        /**
         * @param $value
         * @return mixed
         */
        public function find($value);

        /**
         * @return mixed
         */
        public function toJson();

        /**
         * @return mixed
         */
        public function toArray();

        /**
         * @return mixed
         */
        public function toObject();

        /**
         * @return mixed
         */
        public function toXml();

        /**
         * @return mixed
         */
        public function toSimpleXml();

        /**
         * @return mixed
         */
        public function toPiped();

        /**
         * @return mixed
         */
        public function toQuerty();
    }
}