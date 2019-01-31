<?php

namespace App\Http\Service;

class ProductService {
	// protected $table = "product_type";
	public function getList($model)
	{
		return $model -> getlist();
	}
	public function addProduct($model,$data){
		// var_dump($data);die;
		return $model->addDatas($data);
	}
	public function getProduct($model)
	{
		$delete_static = 1;
		return $model->getProductList($delete_static);
	}
}

?>