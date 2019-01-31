<?php
namespace App\Http\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Model\BaseModel;

class TypeModel extends BaseModel{
	protected $table = "product_type";
	public function getlist()
	{
		return $this->getData();
	}
}
?>