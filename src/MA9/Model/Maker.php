<?php
namespace MA9\Model;

class Maker
{
    public $name;
    public $postcode;
    public $address;
    public $geocode;
    public $url;

    public function setProperties($data)
    {
        $this->name = $data['maker_name'];
        $this->postcode = $data['maker_postcode'];
        $this->address = $data['maker_address'];
        $this->url = $data['maker_url'];
    }
}
