<?php

namespace App\Http\Model;

use App\Http\Model\BaseModel;

class BrandModel extends BaseModel {

    protected $table = 'brand';
    
    protected $primaryKey = 'brand_id';

    protected $statusKey = 'brand_status';
    
     public function status()
    {
        return $this->hasOne('App\Http\Model\StatusModel', 'status_id');
    }
    
    public function getListWithStatus(){
        return $this->with('status')->where([$this->statusKey => self::STATUS_ON])->get();
    }
}
