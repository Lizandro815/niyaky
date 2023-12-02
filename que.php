document.addEventListener("DOMContentLoaded", function () {
    cargarContenido('sobreNosotros');
});

function cargarContenido(seccion) {
    const contentDiv = document.getElementById(seccion);
    if (contentDiv.style.opacity !== "1") {
        document.querySelectorAll('.contenido').forEach(div => {
            div.style.maxHeight = '0';
            div.style.opacity = "0";
            div.style.overflow = 'hidden';
            div.classList.remove('centered-content'); // Quita la clase al colapsar
            setTimeout(() => {
                div.style.display = 'none';
            }, 300);
        });
        setTimeout(() => {
            contentDiv.style.display = 'block';
            contentDiv.style.overflow = 'visible';
            contentDiv.classList.add('centered-content'); // Agrega la clase al expandir
            setTimeout(() => {
                contentDiv.style.maxHeight = '1000px';
                contentDiv.style.opacity = "1";
            }, 50);
        }, 350);
    }
    setActive(seccion);
}

function setActive(seccion) {
    // Quitamos la clase 'active' de todos los ítems
    document.querySelectorAll('.list-group-item').forEach(item => {
        item.classList.remove('active');
    });
    // Buscamos los ítems seleccionados y les añadimos la clase 'active'
    let targetItems = document.querySelectorAll(`[data-section="${seccion}"]`);
    targetItems.forEach(item => {
        item.classList.add('active');
    });
}

