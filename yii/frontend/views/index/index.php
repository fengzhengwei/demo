<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>三级分销</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <style>
    * {
 padding: 0px;
 margin: 0px;
 font-family: "微软雅黑";
}
 
.goodsItem{
 width:280px;
 height: 400px;
 float: left;
 border: 1px solid #ccc;
 margin:5px;
}
#goods{
 width:910px;
}
.goditem{
 list-style: none;
}
.godpic img{
 display: block;
 width:250px;
 height: 250px;
 margin:0px auto;
}
.godprice,.godinfo,.godadd{
 display: block;
 width:220px;
 margin:0px auto;
 text-align: center;
}
.godprice{
 font-size: 20px;
 color: #f00;
}
.godinfo{
 text-align: center;
 font-size: 14px;
 margin: 10px 0px;
 
}
.godadd a{
 display: block;
 width: 150px;
 height: 36px;
 background-color: #fd6a01;
 border-radius: 10px;
 margin: 0px auto;
 text-decoration: none;
 color:#fff;
 line-height: 36px;
}
#godcar{
 position: fixed;
 right: 0px;
 top:40%;
 width: 72px;
 height: 64px;
}
#godcar .dnum{
 width:24px;
 height: 24px;
 border-radius: 12px;
 background-color: #f00;
 text-align: center;
 line-height: 24px;
 position: absolute;
 font-size: 12px;
 top:0px;
}
.godadd .bg {
 background-color: #808080;
}
    </style>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/response.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="maincont">
     <div class="head-top">
      <img src="images/head.jpg" />
      <dl>
       <dt><a href="?r=index/user"><img src="images/touxiang.jpg" /></a></dt>
       <div class="clearfix"></div>
      </dl>
     </div><!--head-top/-->
     <form action="#" method="post" class="search">
      <!-- <input type="text" class="seaText fl" />
      <input type="submit" value="搜索" class="seaSub fr" /> -->
      <input type="text" placeholder="请输入搜索关键字" class="seaText fl"></input>
    <input type="button" value="搜索" class="seaSub fr"></input>
     </form><!--search/-->
     <ul class="reg-login-click">
      <li><a href="?r=login/login">登录</a></li>
      <li><a href="?r=login/reg" class="rlbg">注册</a></li>
      <div class="clearfix"></div>
     </ul><!--reg-login-click/-->
     <!-- <?php //foreach ($res as $k => $v) {?> -->
     <div id="sliderA" class="slider">
       
     <?php foreach ($res as $k => $v) {?>
     <img src="http://www.ldd.com/PHP12/demo/yii/backend/web/images/<?php echo $v['img']?>" />
      <?php }?>
     </div><!--sliderA/-->
     
     <ul class="pronav">
      <li><a href="?r=index/prolist">晋恩干红</a></li>
      <li><a href="?r=index/prolist">万能手链</a></li>
      <li><a href="?r=index/prolist">高级手镯</a></li>
      <li><a href="?r=index/prolist">特异戒指</a></li>
      <div class="clearfix"></div>
     </ul><!--pronav/-->
     <div id="goods">
          <div class="goodsItem">
              <?php foreach ($res as $k => $v) {?>
                  <ul class="goditem">
                      <li class="godpic">
                          <a href="?r=index/prolist">
                              <img src="http://www.ldd.com/PHP12/demo/yii/backend/web/images/<?= $v['img']?>">
                          </a>
                      </li>
                      <li class="godprice">￥<?=$v['price']?></li>
                      <li class="godinfo"><?=$v['name']?></li>
                      <li class="godadd"><a href="?r=index/into_car&goods_id=<?=$v['id']?>">加入购物车</a></li>
                  </ul>

              <?php }?>
          </div>
          <!-- JiaThis Button BEGIN -->
<div class="jiathis_share_slide jiathis_share_32x32" id="jiathis_share_slide">
<div class="jiathis_share_slide_top" id="jiathis_share_title"></div>
<div class="jiathis_share_slide_inner">
<div class="jiathis_style_32x32">
<a class="jiathis_button_qzone"></a>
<a class="jiathis_button_tsina"></a>
<a class="jiathis_button_tqq"></a>
<a class="jiathis_button_weixin"></a>
<a class="jiathis_button_renren"></a>
<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
<script type="text/javascript">
var jiathis_config = {
  slide:{
    divid:'jiathis_main',
    pos:'left'
  }
};
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>  
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_slide.js" charset="utf-8"></script>
</div></div></div>
<!-- JiaThis Button END -->
     <div class="height1"></div>

     <div class="footNav">
      <dl>
       <a href="?r=index/index">
        <dt><span class="glyphicon glyphicon-home"></span></dt>
        <dd>微店</dd>
       </a>
      </dl>
      <dl>
       <a href="?r=index/prolist">
        <dt><span class="glyphicon glyphicon-th"></span></dt>
        <dd>所有商品</dd>
       </a>
      </dl>
      <dl>
       <a href="?r=index/car">
        <dt><span class="glyphicon glyphicon-shopping-cart"></span></dt>
        <dd>购物车 </dd>
       </a>
      </dl>
      <dl>
       <a href="?r=index/user">
        <dt><span class="glyphicon glyphicon-user"></span></dt>
        <dd>我的</dd>
       </a>
      </dl>
      <div class="clearfix"></div>
     </div><!--footNav/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/style.js"></script>
    <!--焦点轮换-->
    <script src="js/jquery.excoloSlider.js"></script>
    <script>
		$(function () {
		 $("#sliderA").excoloSlider();
		});
	</script>
  </body>
</html>
<script>
  $(function(){
    $("input[type=button]").click(function(){
      var txt=$("input[type=text]").val();
      if($.trim(txt)!=""){
 
        $("table tr:not('#theader')").hide().filter(":contains('"+txt+"')").show().css("background","red");
      }else{
        $("table tr:not('#theader')").css("background","#fff").show();
      }
    });
  })
var i = 0;
$(function(){
 var inum = 0;
 if(localStorage.getItem("inum")!==null){
  inum = localStorage.getItem("inum");
 }
 $(".dnum").text(inum);
 
 $(".godadd").click(function(){
  if (!$(this).find("a").hasClass("bg")) {
   i++;
   $(this).find("a").addClass("bg");
   var image = $(this).parent().find(".godpic").find("image");
   var cimage = image.clone();
 
   var imagetop = image.offset().top;
   var imageleft = image.offset().left;
 
   var cartop = $("#godcar").offset().top;
   var carleft = $("#godcar").offset().left;
 
   cimage.appendTo($("body")).css({
    "position": "absolute",
    "opacity": "0.7",
    "top": imagetop,
    "left": imageleft
   }).animate({
    "top": cartop,
    "left": carleft,
    "width": "40px",
    "height": "40px",
    "opacity": "0.3"
   }, 1000, function () {
    cimage.remove();
    $(".dnum").text(i);
    localStorage.setItem("inum", i);
   });
  }
 
 });
}); 
</script>