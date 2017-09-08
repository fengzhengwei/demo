<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>三级分销</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    
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
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
     <?php foreach ($res as $k => $v) {?>
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange"><?php echo count($res)?></strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
        <form action="?r=index/pay" method="post">
            <div class="dingdanlist">
                <table>
                    <tr>
                        <td width="4%"><input type="checkbox" name="id[]" value="<?=$v['id']?>"/></td>
                        <td class="dingimg" width="15%"><img src="http://www.ldd.com/PHP12/demo/yii/backend/web/images/<?= $v['goods_img']?>" /></td>
                        <td width="50%">
                            <h3><?php echo $v['goods_name']?></h3>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4"><span>单价:</span><strong class="orange">￥<?php echo $v['goods_price']?></strong></th>
                    </tr>
                    <tr>
                        <td width="100%" colspan="4"><a href="?r=index/del&id=<?php echo $v['id'] ?>"><input type="checkbox" name="1" /> 删除</a></td>
                    </tr>
                    <?php }?>
                </table>
            </div>
     <!--dingdanlist/-->
     <div class="height1"></div>
     <div class="gwcpiao" style="center">
      <table>
      <tr>
       <td width="50%"></td>
       <td width="50%"><input type="submit" value="去结算"></td>
      </tr>
     </table>

         </form>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/style.js"></script>
    <!--jq加减-->
    <script src="js/jquery.spinner.js"></script>
   <script>
	$('.spinnerExample').spinner({});
	</script>
  </body>
</html>
<script type="text/javascript" src="../web/js/jquery.min.js"></script>
<script>
$(function(){
  $(".add").click(function(){
    var t=$(this).parent().find('input[class*=text_box]');
    t.val(parseInt(t.val())+1)
    setTotal();
})
$(".min").click(function(){
  var t=$(this).parent().find('input[class*=text_box]');
  t.val(parseInt(t.val())-1)
  if(parseInt(t.val())<0){
  t.val(0);
}
setTotal();
})
function setTotal(){
  var s=0;
    $("#tab td").each(function(){
      s+=parseInt($(this).find('input[class*=text_box]').val())*parseFloat($(this).find('span[class*=price]').text());
    });
    $("#total").html(s.toFixed(2));
    }
      setTotal();

})
</script> 