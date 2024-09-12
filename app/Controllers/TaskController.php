<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class TaskController extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        return view('layout/header') . view('newtask') . view('layout/footer');
    }

    public function handleAdd()
    {
        $title = $this->request->getPost("title");
        $description = $this->request->getPost("description");
        $dueDate = $this->request->getPost("dueDate");

        $task = [
            'user_id' => session()->get('id'),
            'title' => $title,
            'description' => $description,
            'due_date' => $dueDate
        ];

        $this->taskModel->insert($task);
        return redirect()->to("/dashboard")->with("success", "Task added");
    }

    public function handleUpdate(int $id)
    {
        $title = $this->request->getPost("title");
        $description = $this->request->getPost("description");
        $dueDate = $this->request->getPost("dueDate");
        $status = $this->request->getPost("status");

        $task = [
            'title' => $title,
            'description' => $description,
            'due_date' => $dueDate,
            'status' => $status
        ];

        $this->taskModel->update($id, $task);
        return redirect()->to("/$id/update-task")->with("success", $status);
    }

    public function handleDelete(int $id)
    {
        $this->taskModel->delete($id);
        return redirect()->to("/dashboard")->with("success", "Task deleted");
    }

    public function update(int $id)
    {
        $task = $this->taskModel->asObject()->find($id);

        $data = [
            'task' => $task
        ];

        return view('layout/header') . view('updatetask', $data) . view('layout/footer');
    }
}
