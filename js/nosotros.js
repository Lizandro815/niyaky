document.addEventListener("DOMContentLoaded", function () {
    cargarContenido('sobreNosotros');
});

function cargarContenido(seccion) {
    const contentDiv = document.getElementById(seccion);
    if (contentDiv.style.opacity !== "1") {
        document.querySelectorAll('.contenido').forEach(div => {
            div.style.maxHeight = '0';
            div.style.opacity = "0";
            setTimeout(() => {
                div.style.display = 'none';
            }, 300);
        });
        setTimeout(() => { 
            contentDiv.style.display = 'block';
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




$(document).ready(function () {
    $(".year").click(function () {
        // Verificar si el botón ya está activo
        if ($(this).hasClass("active")) {
            return;
        }

        $(".year").removeClass("active");
        $(this).addClass("active");

        var selectedYear = $(this).text();
        updateTimeline(selectedYear);
    });

    $(".timeline-btn").click(function () {
        var direction = $(this).text() === ">" ? "+=" : "-=";
        $(".timeline").animate({
            scrollLeft: direction + "300px"
        }, 300);
    });
});

function updateTimeline(year) {
    switch (year) {
        case "2020":
            $(".event-description h2").text("Titulo de liena 1");
            $(".event-description p").text("Fue en el mes de febrero del 2020 cuando se inicia con el micronegocio en la c. 28 x 27 y 29, casa de la Familia Cauich Cel, ofreciendo un menú oriental con servicio únicamente a domicilio. A los pocos meses de iniciar se ven en la necesidad de cerrar operaciones debido al confinamiento de la pandemia COVID.");
            break;
        case "2021":
            $(".event-description h2").text("Titulo de linea 2");
            $(".event-description p").text("Sin embargo, en 2021 se retoman las operaciones. ");
            break;
        case "2022":
            $(".event-description h2").text("Titulo de linea 3");
            $(".event-description p").text("En enero del 2022 cambian de domicilio ubicándose en C. 25 x 28 y 26. En marzo del mismo año abre sus puertas lo que hoy día es CASITA NIYAKY, un espacio para los comensales con capacidad de atención de 25 personas.");
            break;
        case "2024":
            $(".event-description h2").text("Titulo de linea 4");
            $(".event-description p").text("Nada aun.");
            break;
        default:
            $(".event-description h2").text("Evento no registrado");
            $(".event-description p").text("No hay información disponible para este año.");
    }
}

