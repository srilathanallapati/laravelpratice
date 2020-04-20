<?php

namespace App;


class Example
{
    protected $somevar;

    public function __construct($somevar)
    {
        $this->somevar = $somevar;

    }
    
    public function getVar()
    {
        dump($this->somevar);       
    }

    public function go()
    {
        dump('it works!');       
    }
    
}
