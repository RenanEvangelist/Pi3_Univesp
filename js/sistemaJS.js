document.querySelectorAll('.autorizar-btn').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const card = this.closest('.user-card');

        if (confirm('Tem certeza que deseja autorizar este produto?')) {
            fetch(`autorizar.php?id=${id}`, {
                method: 'GET'
            })
            .then(response => {
                if (response.ok) {
                    // Remove com animação
                    card.style.transition = "opacity 0.5s ease";
                    card.style.opacity = 0;
                    setTimeout(() => {
                        card.remove();
                    }, 500);
                } else {
                    alert('Erro ao autorizar. Tente novamente.');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro na conexão.');
            });
        }
    });
});
const btnAdd = document.getElementById('btnAdd');
const btnClose = document.getElementById('btnClose');
const popupForm = document.getElementById('popupForm');
const overlay = document.getElementById('overlay');

btnAdd.addEventListener('click', () => {
    popupForm.style.display = 'block';
    overlay.style.display = 'block';
});

btnClose.addEventListener('click', () => {
    popupForm.style.display = 'none';
    overlay.style.display = 'none';
});

overlay.addEventListener('click', () => {
    popupForm.style.display = 'none';
    overlay.style.display = 'none';
});