<?php

namespace App;


class Sample
{
    protected $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;

    }

    public function handle()
    {
        return $this->apikey;
    }
}