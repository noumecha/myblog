let toggleBtn = document.getElementById('reply-btn');
let form = document.getElementById('reply-form');

form.style.display = 'none';

toggleBtn.addEventListener('click', () => {
    form.style.display = 'block';
});
