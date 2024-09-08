<?php

class Task {
    private $apiUrl = "https://jsonplaceholder.typicode.com/todos";

    
    private function callApi($url, $method = 'GET', $data = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);
        return json_decode($response, true);
    }
    
    
    
    public function getAllTasks() {
      return $this->callApi($this->apiUrl);
    }


    public function updateTaskStatus($taskId, $completed) {
        $url = $this->apiUrl . '/' . $taskId;
        $data = json_encode(['completed' => $completed]);
        return $this->callApi($url, 'PATCH', $data);
    }
    

    public function deleteTask($taskId) {
        $url = $this->apiUrl . '/' . $taskId;
        return $this->callApi($url, 'DELETE');
    }
    
}
?>
