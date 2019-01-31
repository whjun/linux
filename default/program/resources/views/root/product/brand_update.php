<!DOCTYPE HTML>
<html>
<head>
	<base href="../root/">
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>品牌管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 品牌管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form id="form-box">
			<!-- <div id="form-box"> -->
				<input type="text" name="brand_name" placeholder="品牌名称" id="name" value="" class="input-text" style="width:120px">
				<input type="text" placeholder="序号" name="brand_order" value="" class="input-text" style="width:120px">
				<input type="text" placeholder="具体描述" value="" name="brand_content" class="input-text" style="width:120px">
				<span class="btn-upload form-group">
				<input class="input-text upload-url" placeholder="logo上传" type="file" name="brand_logo" id="file-input" readonly style="width:200px">
				<!-- <a href="javascript:void();" class="btn btn-primary upload-btn"><i class="Hui-iconfont">&#xe642;</i> 上传logo</a> -->
				<!-- <input type="file" id="file-input" id="file-input" multiple name="file-2" class="input-file"> -->
				<input type="hidden" name="brand_logo" id="logo-input">
				</span>
				<button id="btn">添加</button>
			<!-- </div> -->
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="70">ID</th>
					<th width="80">排序</th>
					<th width="200">LOGO</th>
					<th width="120">品牌名称</th>
					<th>具体描述</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list['data'] as $key => $value): ?>
					<tr class="text-c" value="<?= $value['brand_id']?>">
						<td><input name="" type="checkbox" value=""></td>
						<td><?php echo $value['brand_id']?></td>
						<td><input type="text" class="input-text text-c" value="<?= $value['brand_order']?>"></td>
						<td><img src="../../storage/app/<?php echo $value['brand_logo']?>" style="width: 40px;height: 40px"></td>
						<td class="text-l"><img title="国内品牌" src="static/h-ui.admin/images/cn.gif"> <?= $value['brand_name']?></td>
						<td class="text-l"><?= $value['brand_content']?></td>
						<td class="f-14 product-brand-manage"><a  id="update" style="text-decoration:none" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" id="del" class="ml-5" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr>
				<?php endforeach ?>		
			</tbody>
		</table>
		<?= $page?>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
// $('.table-sort').dataTable({
// 	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
// 	"bStateSave": true,//状态保存
// 	"aoColumnDefs": [
// 	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
// 	  {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
// 	]

// });

</script>
</body>
</html>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">
	$(document).on("click","#btn",function(){
		var formdata = $('#form-box').serialize();
		// console.log(formdata);return;
		$.ajax({
			url:"../index.php/product_brand_do",
			data:formdata,
			type:"post",
			success:function(res){
				console.log(res);
			}
		})
	})
	$('#file-input').change(function () {
        var file = $(this)[0].files[0];
        var form = new FormData();
        form.append('file', file);
        $.ajax({
            type: 'post',
            url: '../index.php/uploaded',
            data: form,
            contentType: false,
            processData: false,
            success: function (e) {
                $('#logo-input').val(e);
            }
        });
    });
    $("#del").click(function(){
    	var id = $(this).parents('tr').attr("value");
    	$.ajax({
    		url:'../index.php/brand_del',
    		data:{id:id},
    		type:"post",
    		success:function(res){
    			console.log(res);
    		}
    	})
    })
    $("#update").click(function(){
    	var brand_id = $(this).parents('tr').attr("value");
    	$.ajax({
    		url:'../index.php/brand_update',
    		data:{brand_id:brand_id},
    		type:"post",
    		success:function(res){
    			console.log(res);
    		}
    	})
    })
</script>