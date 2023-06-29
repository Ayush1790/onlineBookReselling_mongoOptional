<?php

use Phalcon\Mvc\Controller;


class UserdashboardController extends Controller
{
    public function indexAction()
    {
        $res = $this->mongo->books->book->find();
        $this->view->data = $res;
    }

    public function mybookAction()
    {
        $email = $this->request->get('id');
        $html = "";
        $res = $this->mongo->books->order->find(['user_id' => $email]);
        foreach ($res as $key => $book) {
            $data = $this->mongo->books->book->find();
            foreach ($data as $key => $value) {

                foreach ($value as $key1 => $value1) {
                    if ($value1->id != $book->book_id) {
                        continue;
                    }

                    $html .= "<div class='card m-2 p-2' style='width: 16rem;'>
                    <div class='card-body'>
                      <h3 class='card-title text-primary'>$value1->title</h3>
                      <p class='card-text text-secondary'>Author : $value1->author</p>
                      <p class='card-text'> Pages : " . $value1->pages . "</p>
                      <p class='card-text'> id : " . $value1->id . "</p>
                      <a href='order?id=$value1->id' class='btn btn-primary'>order</a>
                    </div>
                  </div>";
                }
            }
        }
        $this->view->html = $html;
    }
    public function addAction(){
        //redirect to view
    }

    public function adddataAction(){
        $data=[
            'id'=>$this->request->getPost('id'),
            'title'=>$this->request->getPost('title'),
            'author'=>$this->request->getPost('author'),
            'pages'=>$this->request->getPost('pages'),
        ];
        $this->mongo->books->book->insertOne($data);
    }
}
