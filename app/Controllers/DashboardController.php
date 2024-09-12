<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    public function index()
    {
        $tasks = $this->taskModel->asObject()->findAll();

        $data = [
            'tasks' => $tasks
        ];

        return view('layout/header') . view('dashboard', $data) . view('layout/footer');
    }
}
