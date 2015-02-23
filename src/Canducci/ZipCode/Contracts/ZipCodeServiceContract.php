<?php namespace Canducci\ZipCode\Contracts;

interface ZipCodeServiceContract
{
    /**
     * @param $value
     *
     * @return ZipCodeServiceContract
     */
    public function find($value);

    /**
     * @return string
     */
    public function toJson();

    /**
     * @return array
     */
    public function toArray();

    /**
     * @return \stdClass
     */
    public function toObject();

    /**
     * @return string
     */
    public function toXml();

    /**
     * @return \SimpleXMLElement
     */
    public function toSimpleXml();

    /**
     * @return string
     */
    public function toPiped();

    /**
     * @return string
     */
    public function toQuerty();
}