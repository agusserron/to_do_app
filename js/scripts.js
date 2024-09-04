
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
