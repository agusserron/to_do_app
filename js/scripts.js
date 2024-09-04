
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('form[action="controllers/TaskController.php"]').forEach(form => {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();  
            const action = new FormData(form).get('action');
            const taskId = new FormData(form).get('task_id');
            const completed = new FormData(form).get('completed') === 'true';

            const url = form.action;
            const method = action === 'update' ? 'PATCH' : 'DELETE';
            const data = action === 'update' ? JSON.stringify({ completed }) : null;

            try {
                const response = await fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: data,
                });

                if (response.ok) {
       
                    form.closest('.task-card').remove(); 
                } else {
                    console.error('Failed to update or delete the task.');
                }
            } catch (error) {
                console.error('Error:', error);
            }
        });
    });
});


document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData
        }).then(response => response.text())
          .then(html => {
              document.open();
              document.write(html);
              document.close();
          });
    });
});

function handleButtonClick(e) {
    e.preventDefault();
    
    const form = e.target.closest('form');
    const formData = new FormData(form);
    const action = formData.get('action');
    
    if (action === 'update') {
        updateTaskStatus(formData);
    } else if (action === 'delete') {
        deleteTask(formData);
    }
}

function updateTaskStatus(formData) {
    fetch('controllers/TaskController.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(() => {

          location.reload();
      }).catch(error => console.error('Error:', error));
}

function deleteTask(formData) {
    fetch('controllers/TaskController.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
      .then(() => {
          location.reload();
      }).catch(error => console.error('Error:', error));
}
