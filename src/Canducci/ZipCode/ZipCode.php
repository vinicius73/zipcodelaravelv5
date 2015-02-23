<?php namespace Canducci\ZipCode {

    use \Exception;

    class ZipCode implements ZipCodeContracts {

        private $value;
        /**
         * Construct ZipCode
         */
        public function __construct()
        {
            $this->value = '';
        }
        /**
         * @param $value
         * @return $this
         * @throws Exception
         */
        public function find($value)
        {
            if (mb_strlen($value) === 8 || mb_strlen($value) === 9) {
                $this->value = $value;
                return $this;
            }
            throw new Exception("Invalid Zip");
        }


        /**
         * @param string $type
         * @return null|string
         * @throws Exception
         */
        private function toReturn($type = '')
        {
            $url = 'http://viacep.com.br/ws/[cep]/[type]/';
            $url = str_replace('[cep]', $this->value, $url);
            $url = str_replace('[type]', $type, $url);

            $error = null;

            try {
                $get = file_get_contents($url);
            } catch (Exception $e) {
                throw new Exception("Number and http are invalid");
            }
            switch ($type) {
                case 'json': {
                    $error = json_decode($get);
                    if (isset($error->erro) && $error->erro === true) {
                        return null;
                    }
                    break;
                }
                case 'xml': {
                    $error = simplexml_load_string($get);
                    if (isset($error) && isset($error->erro) && $error->erro == 'true') {
                        return null;
                    }
                    break;
                }
                case 'piped': {
                    $error = explode('|', $get);
                    if (isset($error) && sizeof($error) === 1) {
                        $error = explode(':', $error[0]);
                        if (isset($error) && isset($error[0]) && isset($error[1]) && $error[0] == 'erro' && $error[1] == true) {
                            return null;
                        }
                    }
                    break;
                }
                case 'querty': {
                    if ($get === 'erro=true'){
                        return null;
                    }
                    break;
                }
            }
            return $get;
        }

        /**
         * @return null|string
         * @throws Exception
         */
        public function toJson()
        {
            return $this->toReturn('json');
        }

        /**
         * @return mixed
         * @throws Exception
         */
        public function toArray()
        {
            return json_decode($this->toReturn('json'), true);
        }

        /**
         * @return null|\stdClass
         */
        public function toObject()
        {
            $class = new \stdClass;
            $array = $this->toArray();
            if (!is_null($array)) {
                $class->cep        = $array['cep'];
                $class->logradouro = $array['logradouro'];
                $class->bairro     = $array['bairro'];
                $class->localidade = $array['localidade'];
                $class->uf         = $array['uf'];
                $class->ibge       = $array['ibge'];
                return $class;
            }
            return null;
        }

        /**
         * @return null|string
         * @throws Exception
         */
        public function toXml()
        {
            return $this->toReturn('xml');
        }

        /**
         * @return \SimpleXMLElement
         * @throws Exception
         */
        public function toSimpleXml()
        {
            return simplexml_load_string($this->toReturn('xml'));
        }

        /**
         * @return null|string
         * @throws Exception
         */
        public function toPiped()
        {
            return $this->toReturn('piped');
        }

        /**
         * @return null|string
         * @throws Exception
         */
        public function toQuerty()
        {
            return $this->toReturn('querty');
        }

    }
}


