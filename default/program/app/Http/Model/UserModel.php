<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Model;

use Illuminate\Support\Facades\DB;
use App\Http\Model\BaseModel;

/**
 * Description of UserModel
 *
 * @author DELL
 */
class UserModel extends BaseModel{
    protected $table = "user";
    // protected  $primarykey = "id";
    public function getList(){
    	return $this->getList();
    }
    public function getUser($data)
    {
    	// $name = $data['name'];
    	// $pwd = $data['pwd'];
    	return $this->where($data)->first();
    }
}
