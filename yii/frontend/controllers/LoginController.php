<?php
namespace frontend\controllers;

use db;
use Yii;
use yii\web\Controller;

header("content-type:text/html;charset=utf-8");
class LoginController extends Controller
{
    /**
     * @登陆页面
     */
    public $enableCsrfValidation = false;
    public function actionLogin(){
        return $this->renderPartial('login');
    }
    public function actionReg(){
        return $this->renderPartial('reg');
    }
    public function actionLogin_add()
    {
        $post=Yii::$app->request->post();
        //print_r($post);die;
        $q_name=$post['re_name'];

        $q_pwd=$post['re_pwd'];

        $sql="select * from manga_reader where re_name='$q_name' or re_email='$q_name' or re_phone='$q_name' and re_pwd='$q_pwd'";
        $data=Yii::$app->db->createCommand($sql)->queryAll();
        //print_r($data);die;
        $id=$data[0]['re_id'];
        if($data)
        {
            $session=Yii::$app->session;
            $session['name']=$q_name;
            $session['id']=$id;

           echo "<script>alert('登录成功，请稍后，登陆中...');window.location.href='?r=index/index'</script>";
        }else{
            echo "<script>alert('网络繁忙，请稍后重试...');window.location.href='?r=index/index'</script>";
        }

    }
    public function actionRegister_add()
    {
        $post=Yii::$app->request->post();
        $q_name=$post['Username'];
        $q_pwd=$post['Password'];
        $q_email=$post['Email'];
        $q_phone=$post['Phone'];

        $sql="insert into manga_reader VALUES (NUll,'$q_name','$q_email','$q_phone','$q_pwd')";
        $data=Yii::$app->db->createCommand($sql)->execute();
        if($data)
        {
            $session=Yii::$app->session;
            $session['name']=$q_name;

            echo "<script>alert('注册成功，请稍后，登陆中...');window.location.href='?r=index/index'</script>";
        }else{
            echo "<script>alert('网络繁忙，请稍后重试...');window.location.href='?r=index/index'</script>";
        }

    }

}