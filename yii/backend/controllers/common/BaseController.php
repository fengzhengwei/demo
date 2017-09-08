<?php 
namespace backend\controllers\common;
use common\components\BaseWebController;
use common\services\UrlService;
use backend\models\LoginForm;

class BaseController extends BaseWebController
{
	public $msg = '用户名或密码错误';

	public $current_info = '';

	public function __construct($id,$module,$config=[])
	{
		parent::__construct($id,$module,$config);
		$this->layout = 'main';
	}

	public function getUrl()
	{
		return UrlService::BuildBUrl('/login/index');
	}

	public function getLoginadd()
	{
		return UrlService::BuildBUrl('/default/das');
	}


	public $allrow_url = [
		'login/index',
		'login/add',
	];

	public function beforeAction($action)
	{
		if(in_array($action->getUniqueId(),$this->allrow_url))
		{
			return true;
		}
		$cookie_status = $this->checkCookie();
		if(!$cookie_status)
		{
			if(\Yii::$app->request->isAjax)
			{
				$this->renderJson([],'请先登录',-302);
			}else{
				$this->redirect($this->getUrl());
			}
		}
		return true;
		//if($this->geteUrl())
	}

	public function checkCookie()
	{
		//获取cookie
		$cookie_info = $this->getcookie('admin');

		//print_r($cookie_info);die;
		if(!$cookie_info)
		{
			return false;
		}


		//通过#号分割
		list($getCookie_info,$id) = explode("#",$cookie_info);

		//通过id查询数据库
		$login_info = LoginForm::find()->where(['id'=>$id])->asArray()->one();
		
		$this->setparams($login_info);
		$auth_token = $this->authToken($login_info);
		if($getCookie_info != $auth_token)
		{
			return false;
		}
		$this -> current_info = $login_info;
		return true;
	}
	

	public function setparams($key)
	{
		return \Yii::$app->view->params['thisUserInfo'] = $key;
	}

	public function authToken($login_info)
	{
		return md5($login_info['login_name'].$login_info['login_pwd'].$login_info['salf']);
	}


	public function pwd_md5($password)
	{
		return md5($this->current_info['login_name'].md5($password.$this->current_info['salf']));
	}
}


 ?>