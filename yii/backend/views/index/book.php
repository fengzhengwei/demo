<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <input type="text" style="width:250px; line-height:17px;display:inline-block" class="input" placeholder="请输入搜索关键字"></input>
    <input type="button" value="搜索" class="button border-main icon-search"></input>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <!-- <th width="120">ID</th> -->
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th width="25%">内容</th>
         <th width="120">留言时间</th>
        <th>操作</th>       
      </tr>
      <?php foreach ($data as $k => $v) {?>      
        <tr>
          <!-- <td><?php //echo $v['id']?></td> -->
          <td><?php echo $v['uname']?></td>
          <td><?php echo $v['tel']?></td>
          <td><?php echo $v['email']?></td>           
          <td><?php echo $v['content']?></td>
          <td><?php echo $v['writetime']?></td>
          <td><div class="button-group"> <a class="button border-red" href="?r=index/delete&id=<?php echo $v['id'] ?>"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
      <?php }?>
    </table>
  </div>
</form>

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
<?PHP
echo LinkPager::widget([

 'pagination' => $pages,

]);
?>