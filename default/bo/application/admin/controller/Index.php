<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Paginator;
class Index extends Controller
{
    public function add_article()
    {
    	return $this->fetch('add_article');
    }

    public function add()
    {
    	$data = Request::instance()->post();

        $file = request()->file('img');
        if($file){
            $info = $file->move(ROOT_PATH . 'public/static' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                // echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $img = $info->getSaveName();
                $time = date("Y-m-d H:i:s");
                $data = [
                    'articlename'=>$data['articlename'],
                    'state' => $data['state'],
                    'adduser' => $data['adduser'],
                    'userintro'=>$data['userintro'],
                    'time'=>$time,
                    'img'=>$img,
                ];
                $res = Db::table('blogs_backstage_content')->insert($data);
                if($res){
                    $this -> success("添加成功","http://www.wanghongjun.top/bo/public/?s=index/index/show_article_list.html");
                }else{
                    $this -> error("添加失败");
                }
                // // 输出 42a79759f284b767dfcb2a0197904287.jpg
                // echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }

    }




    public function add_type()
    {
    	return $this->fetch();
    }

    public function show_article_list(){
        // $data = Db::table('blogs_backstage_content')->select();
        $data = Db::name('blogs_backstage_content')->paginate(3);
        $page = $data->render();
    	// print_r($data);die;
        $this -> assign("data",$data);
        // $this -> assign("list",$page);
    	$this -> assign("page",$page);
    	return $this->fetch();
    }

    public function show_type_list(){
    	return $this->fetch();
    }

    public function del()
    {
    	$id = Request::instance()->get('id');
        // $id = $_GET['id'];
        // print_r($id);die;
    	$res = Db::table('blogs_backstage_content')->delete($id);
        // var_dump($res);die;
        if($res){
            echo "<script>location.href='http://www.wanghongjun.top/bo/public/?s=index/index/show_article_list.html'</script>";
            // $this -> success("删除成功",'http://www.wanghongjun.top/bo/public/?s=index/index/show_article_list.html');
        }else{
            return $this -> error('删除失败','http://www.wanghongjun.top/bo/public/?s=index/index/show_article_list.html');
        }
    }
    public function update()
    {
        $id = Request::instance()->get('id');
        // var_dump($id);die;
        $data = Db::table('blogs_backstage_content')->where('id',$id)->find();
        // var_dump($data);die;
        $this->assign("data",$data);
        return $this->fetch();
    }
    public function update_add()
    {
        $data = Request::instance()->post();
        $id = $data['id'];
        $file = request()->file('img');
        if($file){
            $info = $file->move(ROOT_PATH . 'public/static' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                // echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $img = $info->getSaveName();
                $data = [
                    'articlename'=>$data['articlename'],
                    'state' => $data['state'],
                    'adduser' => $data['adduser'],
                    'userintro'=>$data['userintro'],
                    // 'time'=>$time,
                    'img'=>$img,
                ];

            $res = Db::name('blogs_backstage_content')->where('id',$id)->update($data);
            if($res){
                echo "<script>location.href='http://www.wanghongjun.top/bo/public/?s=index/index/show_article_list.html'</script>";
                }
            }
        }
        // var_dump($data);die;

    }






}
