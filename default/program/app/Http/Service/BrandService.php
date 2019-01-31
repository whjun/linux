<?php

namespace App\Http\Service;

class BrandService {
    public function useList($model,$data)
    {
        return $model->getUser($data);
    }
    public function addType($model,$data){
    	return $model -> addData($data);
    }
    public function typeData($model)
    {
    	return $model -> getDatas();
    }
    public function userData($model,$data)
    {
    	return $model->addData($data);
    }
    public function addBrand($model,$data) {
        // var_dump($data);die;
        return $model->addData($data);
    }
    public function getlist($model)
    {
        return $model->getDatas();
    }
    public function delData($model,$id)
    {
        $id = $id['id'];
        return $model->deleteBrand($id);
    }
    public function selectData($model)
    {
        // var_dump($data);die;
        return $model->getDatas();
    }
    public function getUpdateBrand($model,$id)
    {
        return $model->getUpdateBrand($id);
    }
}
