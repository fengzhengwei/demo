<?php 
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\captcha\Captcha;
/**
* 
*/
class AdminForm extends Model
{
	public $verifyCode;
	public function rules()
	{
		return [
		[['verifyCode'],'required'],
		['verifyCode', 'captcha','message'=>'','captchaAction'=>'login/captcha'],
		];
	}

    public function attributeLabels() 
    { 
         return [ 
                   // 'verifyCode' => 'Verification Code', 
                   'verifyCode' => '',//在官网的教程里是加上了英文字母，我这里先给去掉了,这里去 掉会不会产生影响因为我还没做接收验证，只做了验证码显示的功能，你们可以自己测试下 
            ]; 
    } 
}

 ?>