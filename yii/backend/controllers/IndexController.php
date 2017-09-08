<?php

namespace backend\controllers;
use Yii;
use backend\controllers\CommontController;
use yii\data\Pagination;
//继承commont控制器 做防非法登录
class IndexController extends CommontController
{	
    //public $layout               = false;               // 关闭表头
     public $enableCsrfValidation = false;
	//首页
    public function actionIndex()
    {	
    	
        return $this->render('index');
    }

    //单页管理
    public function actionPage(){
        // echo 123;die;
         if ($_POST) {
             $data = Yii::$app->request->post();
             $title = $data['title'];
             $img = $data['img'];
             $content = $data['content'];
             $sql = "insert into job_goods values('','$title','$img','$content')";
             $res = Yii::$app->db->createCommand($sql)->execute();
             if ($res > 0) {
                 return $this->redirect('?r=index/show');
             }else{
                 return $this->redirect('?r=index/page');
             }
         }else{
            return $this->render('page');
         }
        
    }


//商品展示
    public function actionShow(){
        $sql = "select * from job_goods";
        $command = Yii::$app->db->createCommand($sql)->queryAll();
        $pages = new Pagination(['totalCount' => count($command),'pageSize'=>'2']);
        $data = Yii::$app->db->createCommand($sql." limit ".$pages->limit." offset ".$pages->offset."")->queryAll();
        return $this->render('show',['data'=>$data,'pages' => $pages]);
    }

    /* 表单删除 */
    public function actionDel()
    {
        $goods_id = Yii::$app->request->get('goods_id');
        //print_r($goods_id);die;
        $sql = "delete from job_goods where goods_id = '$goods_id'";
        $res = Yii::$app->db->createCommand($sql)->execute();
        return $this->redirect('?r=index/show');    
    }
    //商品修改
     public function actionSave(){
        // echo 123;die;
         if ($_POST) {
             $data = Yii::$app->request->post();
             $goods_id = $data['goods_id'];
             $title = $data['title'];
             $img = $data['img'];
             $content = $data['content'];
             $sql = "update job_goods set title='$title',img='$img',content='$content' where goods_id = '$goods_id'";
             $res = Yii::$app->db->createCommand($sql)->execute();
             if ($res > 0) {
                 return $this->redirect('?r=index/show');
             }else{
                 return $this->redirect('?r=index/save');
             }
         }else{
            $goods_id = Yii::$app->request->get('goods_id');
            $sql = "select * from job_goods where goods_id = '$goods_id'";
            $row = Yii::$app->db->createCommand($sql)->queryOne();
            return $this->render('save',array('row'=>$row));
         }
        
    }

    //留言管理
    public function actionBook()
    {   
        $sql = "select * from job_write";
        $command = Yii::$app->db->createCommand($sql)->queryAll();
        $pages = new Pagination(['totalCount' => count($command),'pageSize'=>'2']);
        $data = Yii::$app->db->createCommand($sql." limit ".$pages->limit." offset ".$pages->offset."")->queryAll();
        return $this->render('book',['data'=>$data,'pages' => $pages]);
    }
    //删除留言
    public function actionDelete(){
        $id = Yii::$app->request->get('id');
        $sql = "delete from job_write where id = '$id'";
        $res = Yii::$app->db->createCommand($sql)->execute();
        return $this->redirect('?r=index/book'); 
    }




    //轮播图管理
    public function actionDemo(){
        
       if ($_POST) {
             $data = Yii::$app->request->post();
             $image = $data['image'];
             $sql = "insert into job_upload values('','$image')";
             $res = Yii::$app->db->createCommand($sql)->execute();
             if ($res > 0) {
                 return $this->redirect('?r=index/shows');
             }else{
                 return $this->redirect('?r=index/demo');
             }
         }else{
            return $this->render('demo');
         }
    }

    //商品展示
    public function actionShows(){
        $sql = "select * from job_upload";
        $command = Yii::$app->db->createCommand($sql)->queryAll();
        $pages = new Pagination(['totalCount' => count($command),'pageSize'=>'2']);
        $data = Yii::$app->db->createCommand($sql." limit ".$pages->limit." offset ".$pages->offset."")->queryAll();
        return $this->render('shows',['data'=>$data,'pages' => $pages]);
    }

    /* 表单删除 */
    public function actionDels()
    {
        $id = Yii::$app->request->get('id');
        //print_r($goods_id);die;
        $sql = "delete from job_upload where id = '$id'";
        $res = Yii::$app->db->createCommand($sql)->execute();
        return $this->redirect('?r=index/shows');    
    }
    //轮播图修改
    public function actionSaves(){
        // echo 123;die;
         if ($_POST) {
             $data = Yii::$app->request->post();
             $id = $data['id'];
             $image = $data['image'];
             $sql = "update job_upload set image='$image' where id = '$id'";
             $res = Yii::$app->db->createCommand($sql)->execute();
             if ($res > 0) {
                 return $this->redirect('?r=index/shows');
             }else{
                 return $this->redirect('?r=index/saves');
             }
         }else{
            $id = Yii::$app->request->get('id');
            $sql = "select * from job_upload where id = '$id'";
            $row = Yii::$app->db->createCommand($sql)->queryOne();
            return $this->render('saves',array('row'=>$row));
         }
        
    }
//商品管理
    public function actionGoods(){
        // echo 123;die;
         if ($_POST) {
             $data = Yii::$app->request->post();
             $name = $data['name'];
             $img = $data['img'];
             $price = $data['price'];
             $sql = "insert into goods values('','$name','$img','$price')";
             $res = Yii::$app->db->createCommand($sql)->execute();
             if ($res > 0) {
                 return $this->redirect('?r=index/showes');
             }else{
                 return $this->redirect('?r=index/goods');
             }
         }else{
            return $this->render('goods');
         }
        
    }


//商品展示
    public function actionShowes(){
        $sql = "select * from goods";
        $command = Yii::$app->db->createCommand($sql)->queryAll();
        $pages = new Pagination(['totalCount' => count($command),'pageSize'=>'2']);
        $data = Yii::$app->db->createCommand($sql." limit ".$pages->limit." offset ".$pages->offset."")->queryAll();
        return $this->render('showes',['data'=>$data,'pages' => $pages]);
    }

    /* 表单删除 */
    public function actionDeletes()
    {
        $id = Yii::$app->request->get('id');
        //print_r($goods_id);die;
        $sql = "delete from goods where id = '$id'";
        $res = Yii::$app->db->createCommand($sql)->execute();
        return $this->redirect('?r=index/showes');    
    }
    //商品修改
     public function actionSavess(){
        // echo 123;die;
         if ($_POST) {
             $data = Yii::$app->request->post();
             $id = $data['id'];
             $name = $data['name'];
             $img = $data['img'];
             $content = $data['content'];
             $sql = "update goods set name='$name',img='$img',content='$content' where id = '$id'";
             $res = Yii::$app->db->createCommand($sql)->execute();
             if ($res > 0) {
                 return $this->redirect('?r=index/showes');
             }else{
                 return $this->redirect('?r=index/savess');
             }
         }else{
            $id = Yii::$app->request->get('id');
            $sql = "select * from goods where id = '$id'";
            $row = Yii::$app->db->createCommand($sql)->queryOne();
            return $this->render('savess',array('row'=>$row));
         }
        
    } 
}
