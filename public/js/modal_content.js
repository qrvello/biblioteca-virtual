// Rellenar modal con los datos recibidos validando si existe cada item
const modal_body = document.getElementById("modal-body");

function modal(content, category, subcategory, date) {

    modal_body.innerHTML = /*html*/ `<h2 class="text-uppercase">${content['title']}</h2><br>`;

    // Si el contenido tiene una categoria significa que es un contenido
    if (content['image'] && category) {
        modal_body.innerHTML += /*html*/ `<img class="img-fluid d-block mx-auto" loading="lazy" src='/storage/imagenes/contenido/${content['image']}' />`
    }

    // Si el contenido tiene una fecha significa que es una publicación
    if (content['image'] && date) {
        modal_body.innerHTML += /*html*/ `<img class="img-fluid d-block mx-auto" loading="lazy" src='/storage/imagenes/publicaciones/${content['image']}' />`
    }

    if (content['description']) {
        modal_body.innerHTML += /*html*/ `<p> ${content['description']}</p>`
    }

    if (content['author']) {
        modal_body.innerHTML += /*html*/ `<p>Autor: ${content['author']}</p>`
    }
    if (content['editorial']) {
        modal_body.innerHTML += /*html*/ `<p>Editorial: ${content['editorial']}</p>`
    }
    if (content['matter']) {
        modal_body.innerHTML += /*html*/ `<p>Materia: ${content['matter']}</p>`
    }
    if (date) {
        modal_body.innerHTML += /*html*/ `<p>Fecha de publicacion: <b>${date}</b></p>`
    }

    if (subcategory) {
        modal_body.innerHTML += /*html*/ `<p>
                Subcategoría: <a href="/subcategoria/${content['subcategory_id']}/contenidos">${subcategory['title']}</a>
            </p>`
    }
    if (content['category']) {
        modal_body.innerHTML += /*html*/ `<p>
                Categoría: <a href="/categoria/${content['category_id']}">${category['title']}</a>
            </p>`
    }
    if (content['file']) {
        modal_body.innerHTML += /*html*/ `
            <a class="btn btn-outline-info" href="descargar/${content['id']}">
                <i class="fas fa-download"></i>
                Descargar
            </a>
            `
    }
}