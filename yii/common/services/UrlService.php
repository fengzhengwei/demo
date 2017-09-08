<?php 
namespace common\services;

use yii\helpers\Url;

class UrlService
{

	//设置M模块
	public static function BuildMUrl($path,$key=[])
	{
		$m_url = \Yii::$app->params['refUrl']['m'];
		$param = Url::toRoute(array_merge(["/".$path],$key));
		return $m_url.$param;
	}

	//设置前台模块
	public static function BuildFUrl($path,$key=[])
	{
		$m_url = \Yii::$app->params['refUrl']['f'];
		$param = Url::toRoute(array_merge(["/".$path],$key));
		return $m_url.$param;
	}

	//设置后台模块
	public static function BuildBUrl($path,$key=[])
	{
		$m_url = \Yii::$app->params['refUrl']['b'];
		$param = Url::toRoute(array_merge(["/".$path],$key));
		return $m_url.$param;
	}

	//设置空连接
    public static function BuildNullUrl(){
        return "javascript:void(0)";
    }
    
    //设置图片路径
    public static function BuildPicUrl($file_path){
        return \Yii::$app->params['refUrl']['pic'].$file_path;
    }

    //设置首页
    public static function BuildWwwUrl(){
        $m_url = \Yii::$app->params['refUrl']['f'];
		$param = Url::toRoute(array_merge(["/default/index"]));
		return $m_url.$param;
    }
}

 ?>