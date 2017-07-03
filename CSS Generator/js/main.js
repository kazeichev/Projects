document.getElementById('br_input').oninput = borderReadius;

// Функция работы с бордер-радиус
function borderReadius() {
    // Получаем div с квадратом
    var div = document.getElementById('br_out');
    // Получаем textarea
    var textarea = document.getElementById('br_textout');

    div.style.borderRadius = this.value + 'px';
    textarea.innerHTML = '-webkit-border-radius: ' + this.value + 'px; \n';
    textarea.innerHTML += 'border-radius: ' + this.value + 'px;';
}

