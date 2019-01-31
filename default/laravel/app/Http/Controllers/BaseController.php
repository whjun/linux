<?php

namespace App\Http\Controllers;

class BaseController extends Controller {
    
    protected $ioc;

    public function __construct(\App\Http\IOC $ioc) {
        $this->ioc = $ioc;
    }
}
