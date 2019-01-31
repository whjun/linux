<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{
    
    const CREATED_AT = null;
    const UPDATED_AT = null;
    
    const STATUS_ON = 1;
    const STATUS_OFF = 0;

    const STATUS_INFO = ['关闭', '开启'];
    
    public function getDataById($id) {
        // var_dump($id);die;
        return $this->find($id);
    }
    
    public function getDatas(){
        return $this->where([$this->statusKey => self::STATUS_ON])->paginate(3);
    }
    
    public function getData(){
        return $this->get();
    }

    public function getFirstData($id){
        // var_dump($id);die;
        return $this->where($id)->first();
    }

    public function getLikeDatas($column, $or, $keywords){
        return $this->where($column, $or, $keywords)->Where([$this->statusKey => self::STATUS_ON])->paginate(3);
    }
    
    public function addData($data){
        // var_dump($data);die;
        return $this->insert($data);
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
        return $model->delete();
    }
}
