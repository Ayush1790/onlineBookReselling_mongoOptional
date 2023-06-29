<?php

use Phalcon\Mvc\Controller;
session_start();

class OrderController extends Controller
{
    public function indexAction()
    {
        $id=$this->request->get('id');
        $this->mongo->books->order->insertOne(['book_id'=>$id,'user_id'=>$_SESSION['id']]);
        $this->response->redirect('userdashboard');
    }
   
}
