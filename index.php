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
    <div class="logo">
        <img src="./img/Logo.png" alt="Logo" class="logo-img">
    </div>        
        <nav class="nav">
            <a href="#"><i class="fas fa-search"></i></a>
            <a href="#"> <i class="fa-solid fa-sliders"></i></a> 
            <a href="#">Salir</a>
            <a href="#"><i class="fa-solid fa-xmark"></i></a>                 
        </nav>
    </header>
    <main>
        <aside class="sidebar">
            <h5>PROJECT</h5>
        </aside>
        <section class="main-content">
            <div class="column-task">
            <div class="column todo-column">
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
                                <span> Description</span>
                                <div class="task-actions">
                                    <form method="post" action="controllers/TaskController.php">
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                        <input type="hidden" name="completed" value="true">
                                        <button type="submit" class="btn"><img src="./img/edit-pencil-regular.png" alt="editar" class="icon-img"></button>
                                    </form>
                                    <form method="post" action="controllers/TaskController.php">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                        <button type="submit" class="btn"><button type="submit" class="btn"><img src="./img/icon.png" alt="delete" class="icon-img"></button></button>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
            </div>
            <div class="column-task">
            <div class="column done-column">
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
                                <span> Description</span>
                                <div class="task-actions">
                                    <form method="post" action="controllers/TaskController.php">
                                    <button type="submit" class="btn"><img src="./img/edit-pencil-regular.png" alt="editar" class="icon-img"></button>
                                        <input type="hidden" name="action" value="update">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                        <input type="hidden" name="completed" value="false">                                       
                                    </form>
                                    <form method="post" action="controllers/TaskController.php">
                                    <button type="submit" class="btn"><button type="submit" class="btn"><img src="./img/icon.png" alt="delete" class="icon-img"></button></button>
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">                                       
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        </section>
    </main>
    <script src="js/scripts.js"></script>
</body>
</html>
