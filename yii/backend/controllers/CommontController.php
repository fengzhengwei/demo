<?php

namespace backend\controllers;
use Yii;
use yii\web\Controller;

class CommontController extends Controller 
{
    public function init() 
    {    
    	//自动执行方法 判断session是否登录 没有登录跳转登录界面
    	if(empty(Yii::$app->session['admin_name']))
	        { 
	        echo "<script>alert('未登录，请先登录！');
	            location.href='?r=login/index'</script>";
	        }
    }
}
?>
