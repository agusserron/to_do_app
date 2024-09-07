<?php

require_once './class/Task.php';

class TaskController {
    private $task;

    public function __construct() {
        $this->task = new Task();
    }

    public function listTasks() {
        return $this->task->getAllTasks();
    }

    public function updateTaskStatus() {
        $taskId = $_POST['task_id'];
        $completed = $_POST['completed'] === 'true';

        $response = $this->task->updateTaskStatus($taskId, $completed);
        echo json_encode($response);
    }

    public function deleteTask() {
        $taskId = $_POST['task_id'];

        $response = $this->task->deleteTask($taskId);
        echo json_encode($response);
    }

    public function handleRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
    
        if ($method === 'POST') {
            $action = $_POST['action'];
    
            if ($action === 'update') {
                $this->updateTaskStatus();
            } elseif ($action === 'delete') {
                $this->deleteTask();
            }
        } elseif ($method === 'PATCH') {
            parse_str(file_get_contents("php://input"), $parsedInput);
            $taskId = $parsedInput['task_id'] ?? null;
            $completed = $parsedInput['completed'] ?? null;
    
            if ($taskId && $completed !== null) {
                $this->updateTaskStatus($taskId, $completed);
            }
        } elseif ($method === 'DELETE') {
            parse_str(file_get_contents("php://input"), $parsedInput);
            $taskId = $parsedInput['task_id'] ?? null;
    
            if ($taskId) {
                $this->deleteTask($taskId);
            }
        }
    }
}

$controller = new TaskController();
$controller->handleRequest();
?>



