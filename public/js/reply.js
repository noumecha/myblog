let toggleBtn = document.getElementById('reply-btn');
let form = document.getElementById('reply-form');

function onToggle() {
    form.classList.toggle('hide-class');
}

toggleBtn.addEventListener('click',onToggle);
