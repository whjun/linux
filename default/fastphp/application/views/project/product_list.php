<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>制造工业</title>
    ﻿<meta charset="UTF-8">
    <base href="<?= __PUBLIC__?>/project/" target="_blank, _self, _parent, _top">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate icon" type="image/png" href="images/favicon.png">
<link rel='icon' href='favicon.ico' type='image/x-ico' />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" href="css/default.min.css?t=227" />
<!--[if (gte IE 9)|!(IE)]><!-->
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="lib/amazeui/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script type="text/javascript" src="lib/handlebars/handlebars.min.js"></script>
<script type="text/javascript" src="lib/iscroll/iscroll-probe.js"></script>
<script type="text/javascript" src="lib/amazeui/amazeui.min.js"></script>
<script type="text/javascript" src="lib/raty/jquery.raty.js"></script>
<script type="text/javascript" src="js/main.min.js?t=1"></script>
</head>
<body>
    <header class="header">
    <div class="header-container">
        <div class="header-div pull-left">
                <a class="header-logo">
                    <img src="images/logo.png" />
                </a>
            <button class="am-show-sm-only am-collapsed font f-btn" data-am-collapse="{target: '.header-nav'}">&#xe68b;</button>
        </div>
        

        <nav>
            <ul class="header-nav am-collapse">
                <li class="on"><a href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=index">首页</a></li>
                <li><a href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=about">关于我们</a></li>
                <li><a href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=product_list">产品中心</a></li>
                <li><a href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=new_list">新闻动态</a></li>
                <li><a href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=case_list">产品应用</a></li>
                <li><a href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=contact">联系我们</a></li>
            </ul>
            <div class="header-serch  am-hide-md-down">
                <input type="text" name="name" value="" />
                <em class="font">&#xe632;</em>
            </div>
        </nav>


    </div>
</header>
    <div class="com-banner">
        <img src="images/index_banner.jpg" />
    </div>
    <div class="com-container">
        <div class="cms-g">
            <div class="am-hide-sm-only am-u-md-3 am-u-lg-3">
                <div class="com-nav-left">
                    <h1><em>产品中心</em><i>PRODUCT</i></h1>
                    <ul>
                        <?php foreach ($type as $key => $value): ?>
                            <li><span><a class="type" value='<?= $value['id']?>'><?= $value['type_name']?></a></span></li>
                        <?php endforeach ?>
                       <!--  <li class="on"><a href="#">芯片封装</a></li>
                        <li><a href="#">LED电源</a></li>
                        <li><a href="#">LED灯具</a></li>
                        <li><a href="#">通讯模块</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-9 am-u-lg-9" id="tbody">
                <div class="com-nav-title">
                    <a href="#doc-oc-demo1" class="font am-show-sm-only" data-am-offcanvas>&#xe68b;</a>
                    <span>LED灯具</span>
                </div>
                <div class="com-nav-category">
                    <ul>
                        <?php foreach ($type as $key => $value): ?>
                            <li><span><a class="" value='<?= $value['id']?>'><?= $value['type_name']?></a></span></li>
                        <?php endforeach ?>
                        <!-- <li class="on"><span><a href="#">LED T8灯管</a></span></li>
                        <li><span><a href="#">LED射灯</a></span></li>
                        <li><span><a href="#">LED软光灯</a></span></li>
                        <li><span><a href="#">LED泛光灯</a></span></li>
                        <li><span><a href="#">LED洗墙灯</a></span></li> -->
                    </ul>
                </div>
                <div class="product-list">
                    <?php foreach ($goods as $key => $value): ?>
                        <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                            <div class="product-list-item">                  
                                <div class="product-list-item-bj">
                                    <a id="product" href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=product_info&id=<?= $value['id']?>" value='<?= $value['id']?>'><img src="<?= $value['img']?>" /></a>
                                </div>
                                <div class="product-list-item-title">
                                    <a id="product" href="http://www.wanghongjun.top/fastphp/index.php/?c=project&a=product_info&id=<?= $value['id']?>" value='<?= $value['id']?>' class="f-toe"><?= $value['name']?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="page-list">
                    <a href="#"><<</a>
                    <a href="#"><</a>
                    <a href="#" class="num">1</a>
                    <a href="#" class="num">2</a>
                    <a href="#" class="num">3</a>
                    <a href="#" class="on">4</a>
                    <a href="#" class="num">5</a>
                    <a href="#" class="num">6</a>
                    <a href="#">></a>
                    <a href="#">>></a>
                </div>
            </div>
        </div>
    </div>
    <div id="doc-oc-demo1" class="am-offcanvas">
        <div class="am-offcanvas-bar">
            <div class="am-offcanvas-content com-nav-left com-nav-left1">
                <ul>
                    <li class="on"><span><a href="#">LED T8灯管</a></span></li>
                    <li><span><a href="#">LED射灯</a></span></li>
                    <li><span><a href="#">LED软光灯</a></span></li>
                    <li><span><a href="#">LED泛光灯</a></span></li>
                    <li><span><a href="#">LED洗墙灯</a></span></li>
                </ul>
            </div>
        </div>
    </div>
    ﻿<footer>
    <div class="cms-g">
        <div class="footer">
            <ul>
                <li><a href="#"><span>网站地图</span></a></li>
                <li><a href="#"><span>访问统计</span></a></li>
                <li><a href="#"><span>友情链接</span></a></li>
                <li><a href="#"><span>法律申明</span></a></li>
            </ul>
            <span style="color:#fff;"><a href="http://www.haothemes.com/" target="_blank" title="好主题">好主题</a>提供 - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></span>
        </div>   </div>
</footer>
</body>
</html>
<script src="js/jquery.js"></script>
<script>
    $(document).on('click','.type',function(){
        event.preventDefault();
        var id = $(this).attr('value');
        $.ajax({
            url:"http://www.wanghongjun.top/fastphp/index.php/?c=project&a=product_list_do",
            data:{id:id},
            dataType:"json",
            type:"post",
            success:function(res){
                console.log(res);
                $(".product-list").empty();
                $.each(res.type,function(i,v){
                    div = $("<div class='am-u-sm-6 am-u-md-4 am-u-lg-3'></div>");
                    div.append("<div class='product-list-item'><div class='product-list-item-bj'><a value="+v.id+" id='product'><img src='"+v.img+"' /></a></div><div class='product-list-item-title'><a value="+v.id+" id='product' class='f-toe'>"+v.name+"</a></div></div>"); 
                    $(".product-list").append(div);
                })
               
            }
        })
    })
    // $(document).on('click','#product',function(){
    //     var id = $(this).attr('value');
    //     $.ajax({
    //         url:"http://www.wanghongjun.top/fastphp/index.php/?c=project&a=product_info",
    //         data:{id:id},
    //         dataType:"json",
    //         type:"post",
    //         success:function(res){
    //             console.log(res);
    //             // $("#tbody").empty();
    //             // $.each(res.img,function(i,v){
    //             //     var div=$("<div class='product-info'></div>");
    //             //     div.append("<div>"+id+"</div>");
    //             //     div.append("<div class='am-u-sm-12 am-u-md-6'><div data-am-widget='slider' class='am-slider am-slider-default' data-am-slider='{&quot;animation&quot;:&quot;slide&quot;,&quot;controlNav&quot;:&quot;thumbnails&quot;}'><ul class='am-slides'><li data-thumb="+1+"><img src="+1+" alt='图片'></li></ul></div></div>");
    //             //     $("#tbody").append(div);
    //             // })
    //         }
    //     })
    // })
</script>