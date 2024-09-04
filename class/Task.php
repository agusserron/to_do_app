<?php

class Task {
    private $apiUrl = "https://jsonplaceholder.typicode.com/todos";

    public function getAllTasks() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    public function updateTaskStatus($taskId, $completed) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl . "/$taskId");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['completed' => $completed]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    public function deleteTask($taskId) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl . "/$taskId");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }
}
?>
