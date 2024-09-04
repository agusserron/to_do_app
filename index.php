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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>To-Do List</title>
</head>
<body>
    <header class="header">
        <div class="logo">M</div>
        <nav class="nav">
            <a href="#"><i class="fas fa-search"></i></a>
            <a href="#"><i class="fas fa-cog"></i></a>
            <a href="#">Salir</a>
        </nav>
    </header>
    <main>
        <aside class="sidebar">
            <h2>PROJECT</h2>
        </aside>
        <section class="main-content">
            <div class="column">
                <div class="column-header">
                    <h3>To Do</h3>
                    <button class="add-task-btn">+</button>
                </div>
                <ul>
                    <?php foreach ($tasks as $task): ?>
                        <?php if (!$task['completed']): ?>
                            <li class="task-card">
                                <div class="task-state">Pendiente</div>
                                <h4 class="task-title"><?php echo $task['title']; ?></h4>
                                <div class="task-actions">
                                    <form method="post" action="controllers/TaskController.php">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                        <input type="hidden" name="completed" value="true">
                                        <button type="submit" class="btn"><i class="fas fa-check"></i></button>
                                    </form>
                                    <form method="post" action="controllers/TaskController.php">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                        <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="column">
                <div class="column-header">
                    <h3>Done</h3>
                    <button class="add-task-btn">+</button>
                </div>
                <ul>
                    <?php foreach ($tasks as $task): ?>
                        <?php if ($task['completed']): ?>
                            <li class="task-card">
                                <div class="task-state done">Completada</div>
                                <h4 class="task-title"><?php echo $task['title']; ?></h4>
                                <div class="task-actions">
                                    <form method="post" action="controllers/TaskController.php">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                        <input type="hidden" name="completed" value="false">
                                        <button type="submit" class="btn"><i class="fas fa-undo"></i></button>
                                    </form>
                                    <form method="post" action="controllers/TaskController.php">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                        <button type="submit" class="btn"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>
