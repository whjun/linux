<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{
    
    const CREATED_AT = null;
    const UPDATED_AT = null;
    
    const STATUS_ON = 1;
    const STATUS_OFF = 0;

    public function getDataById($id) {
        return $this->find($id);
    }
    
    public function getDatas(){
        return $this->where([$this->brand_status => self::STATUS_ON])->get();
    }
    
    public function updateData($id, $data){
        $model = $this->getDataById($id);
        foreach($data as $key => $val){
            $model->$key = $val;
        }
        return $model->save();
    }
    
    public function deleteData($id){
        $model = $this->getDataById($id);
        $model->status = self::STATUS_OFF;
        return $model->save();
    }
}
