document.getElementById('slide').onmousemove = function(event) {
    var x = event.offsetX; // Получаем координаты по осе Х
    document.getElementById('slide_two').style.width = x + 'px';
}