<?php

namespace backend\controllers;
use Yii;
use backend\controllers\CommontController;
use yii\data\Pagination;
class DemoController extends CommontController
{
	public function actionDemo(){
		return $this->render('demo');
	}
}	