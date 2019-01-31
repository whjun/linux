<?php
namespace App\Http\Model;

use Illuminate\Support\Facades\DB;
use App\Http\Model\BaseModel;
class BrandModel extends BaseModel{
	protected $table = "product_brand";
	protected $statusKey = 'delete';
	protected $primaryKey = 'brand_id';
	public function deleteBrand($id)
	{
		// var_dump($id);die;
		return $this->deleteData($id);
	}
	public function getUpdateBrand($id)
	{
		return $this->getFirstData($id);
	}
}
?>