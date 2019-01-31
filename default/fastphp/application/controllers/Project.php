<?php
/**
 * 
 */
class Project extends Controller
{
	public function login()
	{
		$this->_views->display("login");
	}
	public function login_do()
	{
		$name = $_POST['name'];
		$pwd = $_POST['pwd'];
		$Project = new ProjectModel();
		// var_dump($Project);die;
		$res = $Project->selectData($name,$pwd);
		// var_dump($res);die;
		if($res){
			echo "<script>alert('登录成功');location.href='http://www.wanghongjun.top/fastphp/index.php/?c=project&a=index'</script>";
		}else{
			echo "<script>alert('登录失败');location.href='http://www.wanghongjun.top/fastphp/index.php/?c=project&a=login'</script>";
		}
		// var_dump($res);
	}
	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index()
	{
		$Project = new GoodsCarouselModel();
		$res = $Project->queryData();
		// var_dump($res);die;
		$goods = new GoodsModel();
		$res_goods = $goods->queryData();

		$goodsType = new GoodsTypeModel();
		$goods_type = $goodsType->queryData();
		$id = 1;
		$News = new NewsModel();
		// var_dump($News);
		$News = $News->queryWhere($id);

		$goodsuse = new GoodsUseModel();
		$use = $goodsuse->queryData();
		// print_r($use);die;
		// echo 1;die;
		// echo 1;die;
		$this->_views->assign('res',$res);
		$this->_views->assign('res_goods',$res_goods);
		$this->_views->assign('goods_type',$goods_type);
		$this->_views->assign('News',$News);
		$this->_views->assign('use',$use);
		// echo 1;die;
		// var_dump($data);die;
		$this->_views->display('index');
	}
	/**
	 * 关于我们
	 * @return [type] [description]
	 */
	public function about()
	{
		$abouttype = new AboutTypeModel();
		$abouttype = $abouttype->queryData();
		$this->_views->assign('abouttype',$abouttype);

		$this->_views->display('about');
	}
	public function about_do()
	{
		$id = $_POST['id'];
		$abouttype = new AboutTypeModel();
		$abouttype = $abouttype->queryOne($id);
		$type = $abouttype['intro'];

		// echo $type;
		echo json_encode(["about"=>$type],JSON_UNESCAPED_UNICODE);
		
	}
	/**
	 * 产品中心
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function product_list()
	{
		$goodstype = new GoodsTypeModel();
		$type = $goodstype->queryData();
		$id = 1;
		$goods = new GoodsModel();
		$goods = $goods->WhereId($id);
		// var_dump($goods);die;
		$this->_views->assign('type',$type);
		$this->_views->assign('goods',$goods);
		$this->_views->display('product_list');
	}
	public function product_list_do()
	{
		$id = $_POST['id'];
		$goodstype = new GoodsModel();
		$type = $goodstype->queryWhere($id);

		echo json_encode(['type'=>$type],JSON_UNESCAPED_UNICODE);
	}
	public function product_info()
	{
		$id = $_GET['id'];
		$image = new ImagesModel();
		$img = $image->queryOne($id);

		$goods = new GoodsModel();
		$goods = $goods->queryOne($id);

		// var_dump($goods);die;
		$this->_views->assign("goods",$goods);
		$this->_views->assign('img',$img);
		$this->_views->display("product_info");
	}
	/**
	 * 新闻动态
	 * @param string $value [description]
	 */
	public function new_list()
	{
		$newsType = new NewsTypeModel();
		$newType = $newsType->queryData();
		// var_dump($newType);die;
		$news = new NewsModel();
		$id = 1;
		$news = $news->queryDataWhere($id);
		$this->_views->assign("newType",$newType);
		$this->_views->assign("news",$news);
		$this->_views->display('new_list');
	}
	public function new_list_do()
	{
		$id = $_POST['id'];
		// $id = 1;
		$newsType = new NewsModel();
		$new = $newsType->queryWhere($id);

		// foreach($new as $val){
		// 	$title[] = $val['new_title'];
		// }
		echo json_encode(["new"=>$new],JSON_UNESCAPED_UNICODE);
	}
	/**
	 * 产品应用
	 * @param string $value [description]
	 */
	public function case_list()
	{
		$case = new CaseTypeModel();
		$case = $case->queryData();
		$this->_views->assign("case",$case);
		$this->_views->display('case_list');
	}
	public function case_list_do()
	{
		$id = $_GET['id'];
		$case = new CaseModel();
		$case = $case->queryData($id);
		var_dump($case);die;
	}
	/**
	 * 联系我们
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function contact()
	{
		$Project = new GoodsCarouselModel();
		$res = $Project->queryData();
		$this->_views->display('contact');
	}
	public function new_info()
	{
		$id = $_GET['id'];
		$new = new NewsModel();
		$new = $new -> queryOne($id);
		$this->_views->assign("new",$new);
		$this->_views->display('new_info');
	}
}


?>