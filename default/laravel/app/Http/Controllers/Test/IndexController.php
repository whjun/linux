<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\BaseController;

class IndexController extends BaseController {

    public function index() {
        $data = $this->ioc->BrandService('getList');
        return view('brand/index', [
            'list' => $data->toArray()
        ]);
    }
}
