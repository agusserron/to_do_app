<?php
require_once './controllers/TaskController.php';

$controller = new TaskController();
$tasks = $controller->listTasks();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>To-Do List</title>
</head>
<body>
    <h1>Gestión de Tareas</h1>
    <div class="tasks">
        <div class="todo">
            <h2>To Do</h2>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <?php if (!$task['completed']): ?>
                        <li>
                            <?php echo $task['title']; ?>
                            <form method="post" action="controllers/TaskController.php">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <input type="hidden" name="completed" value="true">
                                <button type="submit">Marcar como completada</button>
                            </form>
                            <form method="post" action="controllers/TaskController.php">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="done">
            <h2>Done</h2>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <?php if ($task['completed']): ?>
                        <li>
                            <?php echo $task['title']; ?>
                            <form method="post" action="controllers/TaskController.php">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <input type="hidden" name="completed" value="false">
                                <button type="submit">Marcar como pendiente</button>
                            </form>
                            <form method="post" action="controllers/TaskController.php">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                <button type="submit">Eliminar</button>
                            </form>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
