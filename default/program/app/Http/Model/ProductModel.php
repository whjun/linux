<?php
namespace App\Http\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Model\BaseModel;
class ProductModel extends BaseModel{
	protected $table = "product";
	protected $primarykey = "product_id";
	protected $statusKey = 'delete_static';
	public function addDatas($data)
	{
		return $this->addData($data);
	}
	public function getProductList($data)
	{
		// var_dump($data);die;
		return $this->getDatas($data);
	}
}
?>