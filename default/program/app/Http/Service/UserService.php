<?php
namespace App\Http\Service;

class UserService {

	public function getList($model)
	{
		return $model->getData();
	}
}

?>