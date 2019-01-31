<?php

namespace App\Http\Model;

use App\Http\Model\BaseModel;

class StatusModel extends BaseModel {

    protected $table = 'status';
    protected $primaryKey = 'status_id';

    public function brand(){
        return $this->hasMany('App\Http\Model\BrandModel', 'brand_status');
    }
}
