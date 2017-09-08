<?php 
namespace app\models;

use Yii;
use yii\base\Model;
use yii\captcha\Captcha;
class LoginForm extends Model
{

	public $verifyCode;//验证码这个变量是必须建的，因为要储存验证码的值` /** * @return array the validation rules. */

	public function rules()
	{
		return [
			 ['verifyCode', 'captcha'],//注意这里，在百度中查到很多教程，这里写的都不一样，最 简单的写法就像我这种写法，当然还有其它各种写法 
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