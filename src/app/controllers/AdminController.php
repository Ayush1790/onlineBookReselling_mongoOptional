<?php

use Phalcon\Mvc\Controller;


class AdminController extends Controller
{
    public function indexAction()
    {
        $book=$this->mongo->books->book->find();
        $user=$this->mongo->store->user->find();
        $order=$this->mongo->books->order->find();
        $this->view->book=$book;
        $this->view->user=$user;
        $this->view->order=$order;
    }
    
   
}
