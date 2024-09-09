## Sistema de Gestión de Tareas (To-Do List)

### Descripción
Esta aplicación web permite gestionar un sistema de tareas (To-Do List) utilizando datos obtenidos de una API externa. Los usuarios pueden listar, 
marcar como completadas y eliminar tareas. La aplicación está integrada con la API pública JSONPlaceholder.

### Requisitos del Sistema
- **XAMPP** o cualquier servidor con PHP (7.x o superior).
- Navegador web moderno.

### Instalación
1. **Clona el repositorio:**
   ```bash
   git clone https://github.com/agusserron/to_do_app.git
   ```

2. **Coloca el proyecto en la carpeta `htdocs` de XAMPP:**
   - Si se utiliza XAMPP, colocar la carpeta del proyecto en la ruta `C:\xampp\htdocs\to_do_app`.

3. **Inicia el servidor:**
   - Abrir el panel de control de **XAMPP** y activar el servidor **Apache**.

### Cómo Ejecutar la Aplicación
1. Abrir navegador web.
2. Acceder a la siguiente URL:
   ```
   http://localhost/to_do_app/
   ```

### Funcionalidades
- **Listar Tareas**: La aplicación muestra las tareas obtenidas de la API externa.
- **Marcar Tareas como Completadas**: Los usuarios pueden cambiar el estado de una tarea entre completada y pendiente.
- **Eliminar Tareas**: Los usuarios pueden eliminar tareas de la lista.

### Uso de la API
La aplicación utiliza la API de JSONPlaceholder para obtener la lista de tareas a través del endpoint `/todos`. Todas las solicitudes se realizan mediante llamadas AJAX 
para evitar recargar la página.

### Estructura del Proyecto
- `/class/Task.php`: Clase PHP que maneja las interacciones con la API.
- `/controllers/TaskController.php`: Controlador que gestiona las solicitudes HTTP.
- `/index.php`: Punto de entrada principal de la aplicación.
- `/css/styles.css`: Estilos CSS de la aplicación.
- `/js/scripts.js`: Archivo JavaScript que gestiona las interacciones con la API.
- `/fonts: Carpeta con las fuentes utilizadas en el frontend.

### Autor
Desarrollado por: Agustina Serron  
Email: agusserron@gmail.com
