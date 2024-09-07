document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form[action="controllers/TaskController.php"]').forEach(form => {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const formData = new FormData(form);
            const action = formData.get('action');
            const taskId = formData.get('task_id');
            const completed = formData.get('completed') === 'true';

            
            const url = form.getAttribute('action'); 
            let method = 'POST';
            let data = null;

            if (action === 'update') {
                method = 'PATCH';
                data = JSON.stringify({ completed });
            } else if (action === 'delete') {
                method = 'DELETE';
                data = null; 
            }


            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': method === 'PATCH' ? 'application/json' : 'application/x-www-form-urlencoded',
                    },
                    body: data,
                });

                if (response.ok) {
                    const taskCard = form.closest('.task-card');
                    
                    if (action === 'delete') {
                        taskCard.remove();
                    } else if (action === 'update') {
                       
                        const taskState = taskCard.querySelector('.task-state');
                        taskState.textContent = completed ? 'Completada' : 'Pendiente';
                        taskState.classList.toggle('done', completed);

                        
                        const targetColumn = completed ? 'done' : 'todo';
                        const targetList = document.querySelector(`.${targetColumn}-column ul`);

                        
                        targetList.appendChild(taskCard);
                    }
                } else {
                    console.error('Failed to update or delete the task. Status:', response.status);
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
});

