<?php namespace Canducci\ZipCode;

use Canducci\ZipCode\Contracts\ZipCodeServiceContract;

class ZipCode
{
    /**
     * @var ZipCodeServiceContract
     */
    private $service;


    /**
     * @param ZipCodeServiceContract $service
     */
    public function __construct(ZipCodeServiceContract $service)
    {
        $this->service = $service;
    }

    /**
     * @param $value
     *
     * @return ZipCodeServiceContract
     */
    public function find($value)
    {
        return $this->service->find($value);
    }

}
