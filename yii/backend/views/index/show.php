<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
?>
<?PHP
          echo LinkPager::widget([

           'pagination' => $pages,

          ]);
      ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 单页信息</strong></div>
  <div class="body-content">
  <div class="padding border-bottom">
      <input type="text" style="width:250px; line-height:17px;display:inline-block" class="input" placeholder="请输入搜索关键字"></input>
    <input type="button" value="搜索" class="button border-main icon-search"></input>
    </div>
    <form method="post" class="form-x" action="?r=index/show">      
      <div class="form-group">
       <table class="table table-hover text-center">
      <tr>
         <!-- <th width="100" style="text-align:left; padding-left:20px;">ID</th> -->
        <th>商品名称</th>
        <th>图片</th>
        <th>介绍</th>
        <th width="310">操作</th>
      </tr>
      <?php foreach ($data as $k => $v) {?>
      <tr>
          <!-- <td style="text-align:left; padding-left:20px;"><?php //echo $v['goods_id']?></td> -->
          <td><?php echo $v['title']?></td>
          <td width="10%"><img src="images/<?php echo $v['img']?>" alt="" width="70" height="50" /></td>
          <td><?php echo $v['content']?></td>
          <td><div class="button-group"> <a class="button border-main" href="?r=index/save&goods_id=<?php echo $v['goods_id'] ?>"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="?r=index/del&goods_id=<?php echo $v['goods_id'] ?>"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
        <?php } ?>
      </div>
    </form>

  </div>

</div>

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
</script>

