<?php
namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listUserTasks($userId)
    {
        return $this->repository->getAllByUser($userId);
    }

    public function createTask($data)
    {
        // Aqui poderia ter regra futura:
        // validar limite de tarefas por plano SaaS

        return $this->repository->create($data);
    }

    public function updateTask($task, $data)
    {
        return $this->repository->update($task, $data);
    }

    public function deleteTask($task)
    {
        return $this->repository->delete($task);
    }
}