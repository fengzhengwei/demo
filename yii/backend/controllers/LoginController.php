<?php

namespace backend\controllers;
use Yii;
use backend\models\JobAdmin;
use backend\models\AdminForm;
use yii\filters\AccessControl;
class LoginController extends \yii\web\Controller
{   
    //设置默认访问方法
	public $defaultAction = 'index';
    //登录
    public function actionIndex()
    {	
    	$model = new AdminForm();
    	if (Yii::$app->request->post()) 
    	{   
            $data = Yii::$app->request->post();
    	    $admin = JobAdmin::find()->where(['admin_name'=>$data['admin_name'],'password'=>md5($data['password'])])->One();
            if ($admin) 
            {
               Yii::$app->session['admin_name'] = $admin->admin_name;
               return $this->redirect(['index/index']);
            }else{
            echo "<script>alert('用户名和密码错误');
                location.href='?r=login/index'</script>";
            }

    	}else
    	{
        return $this->renderPartial('index',['model'=>$model]);    		
    	}

    }
    //退出登录
    public function actionDestroy()
    {
        unset(Yii::$app->session['admin_name']);
        echo "<script>alert('退出成功');
                location.href='?r=login/index'</script>";
    }
    //验证码 未完成
    // public function actions() { 
    //     return [ 
    //         'captcha' => [ 
    //             'class' => 'yii\captcha\CaptchaAction', 
    //             'maxLength' => 4, 
    //             'minLength' => 4 
    //         ], 
    //     ]; 
    // }
    // public function behaviors() { 
    //     return [ 
    //         'access' => [ 
    //             'class' => AccessControl::className(), 
    //             'rules' => [ 
    //                 [ 
    //                     'actions' => ['index', 'error', 'captcha'], 
    //                     'allow' => true, 
    //                 ], 
    //             ], 
    //         ]
    //         ];
    // }

}
