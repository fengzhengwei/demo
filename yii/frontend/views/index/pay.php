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
     <div class="dingdanlist" onClick="window.location.href='?r=index/address'">
        <script type="text/javascript" src="/scripts/jquery/jquery.form.min.js"></script>  
    <script type="text/javascript" src="/scripts/jquery/Validform_v5.3.2_min.js"></script>  
    <script type="text/javascript">  
        $(function () {  
            //表单提交  
            AjaxInitForm('order_form', 'btnSubmit', 0);  
        });  
    </script>  
    <!--结算中心-->   
  
    <div class="line20"></div>  
      
    <form name="order_form" id="order_form" url="/tools/submit_ajax.ashx?action=order_save">  
      
    <div class="line20"></div>  
    <h3 class="bar_tit">商品清单</h3>  
    <table width="938" border="0" align="center" cellpadding="8" cellspacing="0" class="cart_table">  
      <tbody><tr>  
        <th width="64"></th>  
        <th align="left">商品名称</th>  
        <th width="110" align="center">颜色</th>  
        <th width="80" align="center">积分</th>  
        <th width="80" align="center">单价</th>  
        <th width="80" align="center">数量</th>  
        <th width="80" align="center">优惠</th>  
        <th width="100" align="center">金额小计</th>  
        <th width="100" align="center">积分小计</th>  
      </tr>  
       <?php foreach ($res as $key => $value) {?> 
      <tr>  
        <td><a target="_blank" href="/goods/show-63.html"><img src="http://www.ldd.com/PHP12/demo/yii/backend/web/images/<?php echo $value['img']?>" class="img"></a></td>  
        <td><a target="_blank" href="/goods/show-63.html">戒指</a></td>  
        <!--颜色-->  
        <td align="center"><input name="goods_color" type="hidden" value=""></td>  
  
        <td align="center">  
            
          +  
            
          10  
        </td>  
        <td align="center">￥<?php echo $value['price']?><input name="goods_price" type="hidden" value="5500.00"></td>  
        <td align="center">1</td>  
        <td align="center">￥<label name="discount_amount"><?php echo $value['price']?></label></td>  
        <td align="center"><font color="#FF0000" size="2">￥<label name="real_amount"><?php echo $value['price']?><5500</label></font></td>  
        <td align="center">  
          <font color="#FF0000" size="2">  
              
            +  
              
            <label name="point_count">10</label>  
            </font>  
        </td>  
        <td><input id="car_id" name="car_id" type="hidden" value="63"></td>  
      </tr>  
        
    </tbody>
    </table>          
      <div class="right" style="text-align:right;line-height:40px;">   
        <b class="font18">应付总金额：<font color="#FF0000">￥<label id="order_amount"><?php echo $value['price']?></label></font></b>  
      </div>  
    </div>   
  <?php }?>
    <div class="clear"></div>  
    </form>  
    <!--/结算中心-->  
     </div><!--dingdanlist/-->
     
      
    </div><!--content/-->
    
    <div class="height1"></div>
    <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="40%"><a href="?r=index/success" class="jiesuan">提交订单</a></td>
      </tr>
     </table>
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