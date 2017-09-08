<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class IndexController extends Controller
{
    public function init()
    {
        $this->enableCsrfValidation = false;
    }
    public function actionIndex(){

        $name=Yii::$app->session['name'];
//        print_r($name);die;

        $sql = "select * from goods";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderPartial('index',['res'=>$res]);
    }
    public function actionLogin_success()
    {
        $data = Yii::$app->request->post();
        $sql = "select * from `job_user` where username = '".$data['username']."' and password = '".$data['password']."'";
        $res = Yii::$app->db->createCommand($sql)->queryOne();
        if($res){
            setcookie('name',$data['username'],time(),false,'/');
            echo "<script>alert('登录成功');location.href='?r=index/index'</script>";
        }else{
            echo 'NO';
        }
    }
    //加入购物车
    public function actionInto_car()
    {
        $goods_id = Yii::$app->request->get('goods_id');
        $data = Yii::$app->db->createCommand("select * from goods where id = $goods_id")->queryOne();
        $arr = [
            'goods_id' => $data['id'],
            'goods_name' => $data['name'],
            'goods_price' => $data['price'],
            'goods_img' => $data['img'],
            'goods_num' => 1,
            'user_id' => 1,
        ];
        $res = Yii::$app->db->createCommand()->insert('car',$arr)->execute();
        if($res){
            echo '<script>alert("加入购物车成功");window.history.back()</script>';
        }

    }
    public function actionCar(){
        $id = 1;
        $sql = "select * from car where user_id = $id";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderPartial('car',['res'=>$res]);
    }
    public function actionPay()
    {
        /*$id = Yii::$app->request->post('id');
       //print_r($id);die;
        $res = '';         
        foreach($id as $k => $v){
            $sql = "select * from 'car' where id = $v";
            $data = Yii::$app->db->createCommand($sql)->queryOne();
            $goods_id = $data['goods_id'];
            $goods_price = $data['goods_price'];
            $sqls = "insert into 'order' values(null,'$goods_id','$goods_price','1','$goods_price')";
            $res = Yii::$app->db->createCommand($sqls)->execute();
        }*/
        //从购物车查询数据
            $id = [1,2,3,4,5,6,7,8,9,10];

            //拼接ID用于IN查询
            $str = '(';

                foreach($id as $key => $val){
                    $str .= $val.',';
                }   

            $str = substr($str, 0, -1);
            $str .= ')';

            //查询购物车表数据
            $sql = 'select `goods_id`, `goods_price` car where id in '.$str;

            //假设查询出来的数据
            $data = [
                ['goods_id' => 1, 'goods_price' => 2],
                ['goods_id' => 2, 'goods_price' => 2],
                ['goods_id' => 3, 'goods_price' => 2],
                ['goods_id' => 4, 'goods_price' => 2],
                ['goods_id' => 5, 'goods_price' => 2],
            ];

            //拼接 values 用于如订单表
            $_str = '';
            foreach($data as $val){
                $_str .= "(";
                $_str .= "'".$val['goods_id']."','".$val['goods_price']."'";
                $_str .= "),";
            }
            $_str = substr($_str, 0, -1);

            //sql语句
            $insert_sql = 'insert into `order` (goods_id, goods_price) values '.$_str;
            $res = Yii::$app->db->createCommand($insert_sql)->execute();
        if($res){
            echo "<script>alert('结算成功');location.href='?r=index/comment'</script>";
        }

    }



    public function actionUser(){
        $data = Yii::$app->request->post();
        $sql = "select * from manga_reader";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderPartial('user',['res'=>$res]);
    }

    //购物车删除
    public function actionDel(){
        $id = Yii::$app->request->get('id');
        //print_r($goods_id);die;
        $sql = "delete from car where id = '$id'";
        $res = Yii::$app->db->createCommand($sql)->execute();
        return $this->redirect('?r=index/car');
    }
    public function actionProlist(){
        $data = Yii::$app->request->post();
        //print_r($data);die;
        $sql = "select * from goods";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        //print_r($res);die;
        return $this->renderPartial('prolist',['res'=>$res]);
    }
    public function actionProinfo(){
        $data = Yii::$app->request->post();
        $sql = "select * from goods";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderPartial('proinfo',['res'=>$res]);
    }
    //地址
    /*public function actionAddress(){
        $data = Yii::$app->request->post();
        //print_r($data);die;
        $sql = "select * from job_address";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderPartial('address',['res'=>$res]);
    }*/


    //提交成功
    /*public function actionSuccess(){
        $data = Yii::$app->request->post();
        //print_r($data);die;
        $sql = "select * from goods";
        $res = Yii::$app->db->createCommand($sql)->queryAll();
        return $this->renderPartial('success',['res'=>$res]);
    }*/
    //评论
    public function actionComment()
    {
        

        return $this->renderPartial("comment");
    }


   /* //评论页面
    public function actionShow1()
    {
        //$name=Yii::$app->session['name'];
        $id=Yii::$app->request->get('p_id');

        $sql="select * from manga_comment where p_id='$id'";
        $data=Yii::$app->db->createCommand($sql)->queryAll();


       return $this->renderPartial("comment",['data'=>$data]);
    }
*/

    //评论提交页面
    public function actionComment_add()
    {
        $re_id=Yii::$app->session['id'];

        $post=Yii::$app->request->post();
        $comment=$post['comment'];
        $id=$post['id'];
        $time=date("Y-m-d H:i");

        $sql="insert into manga_comment VALUES (Null,'$comment','$time','$re_id','$id')";
        $data=Yii::$app->db->createCommand($sql)->execute();
        if($data)
        {
            echo "<script>alert('评论成功，正在发表，请稍后...');window.location.href='?r=index/show1'</script>";
        }else{
            echo "<script>alert('网络繁忙，请稍后重试...');window.location.href='?r=index/comment'</script>";
        }
    }
}