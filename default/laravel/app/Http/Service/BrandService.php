<?php

namespace App\Http\Service;

use App\Http\Model\BrandModel;

class BrandService {

    public function getList() {
        $model = new BrandModel();
        return $model->getListWithStatus();
    }

}
