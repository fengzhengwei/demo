<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class ProlistController extends Controller
{
     public function actionProlist(){
          $data = Yii::$app->request->post();
          $sql = "select * from goods";
          $res = Yii::$app->db->createCommand($sql)->queryAll();
     	return $this->renderPartial('prolist',['res'=>$res]);
     }
 }