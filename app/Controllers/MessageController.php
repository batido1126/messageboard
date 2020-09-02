<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MessageModel;
use CodeIgniter\API\ResponseTrait;

class MessageController extends Controller
{
    use ResponseTrait;

    public function getMessages()
    {
        $MessageModel = new MessageModel();
        $messages = $MessageModel->findAll();

        return $this->response->setJSON($messages);
    }

    public function creatComment()
    {
        $MessageModel = new MessageModel();

        $data = [
            'user' => $this->request->getPost('user'),
            'comment'  => $this->request->getPost('comment'),
            'time'  => date("Y-m-d H:i:s"),
        ];

        $MessageModel->insert($data);
        $id = $MessageModel->insertID();

        if ($id != 0) {
            return $this->response->setJSON((object) [
                'status' => 'success',
                'message' => '新增成功',
                'id' => $id,
            ]);
        } else {
            return $this->response->setJSON((object) [
                'status' => 'failed',
                'message' => '新增失敗',
            ]);
        }
    }

    public function deleteComment()
    {
        $MessageModel = new MessageModel();
        $id = $this->request->getPost('id');

        $MessageModel->delete($id);
        $result = $MessageModel->affectedRows();

        if ($result == 1) {
            return $this->response->setJson((object)[
                'status' => 'success',
                'message' => '刪除成功',
            ]);
        } else {
            return $this->response->setJson((object)[
                'status' => 'failed',
                'message' => '刪除失敗',
            ]);
        }
    }

    public function updateComment()
    {
        $MessageModel = new MessageModel();
        $id = $this->request->getPost('id');
        $comment =  $this->request->getPost('comment');
        $data = [
            'comment' => $comment,
            'time'  => date("Y-m-d H:i:s"),
        ];

        $MessageModel->update($id, $data);
        $result = $MessageModel->affectedRows();

        if ($result == 1) {
            return $this->response->setJson((object)[
                'status' => 'success',
                'message' => '修改成功',
            ]);
        } else {
            return $this->response->setJson((object)[
                'status' => 'failed',
                'message' => '修改失敗',
            ]);
        }
    }

}
