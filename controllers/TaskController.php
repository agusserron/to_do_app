<?php
require_once __DIR__ . '/../class/Task.php';

class TaskController {
    private $task;

    public function __construct() {
        $this->task = new Task();
    }

    public function listTasks() {
        return $this->task->getAllTasks();
    }

    public function updateTaskStatus($taskId, $completed) {
        return $this->task->updateTaskStatus($taskId, $completed);
    }

    public function deleteTask($taskId) {
        return $this->task->deleteTask($taskId);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new TaskController();

    if (isset($_POST['action']) && $_POST['action'] === 'update') {
        $taskId = $_POST['task_id'];
        $completed = $_POST['completed'] === 'true' ? true : false;
        $controller->updateTaskStatus($taskId, $completed);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $taskId = $_POST['task_id'];
        $controller->deleteTask($taskId);
    }

    header("Location: ../index.php");
    exit();
}
?>

