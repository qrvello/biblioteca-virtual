// Rellenar modal con los datos recibidos validando si existe cada item
const modal_body = document.getElementById("modal-body");

function modal(content, date, admin = false) {

    modal_body.innerHTML = /*html*/ `<h2 class="text-uppercase">${content['title']}</h2><br>`;

    // Si el contenido tiene una categoria significa que es un contenido
    if (content['image'] && content['category']) {
        modal_body.innerHTML += /*html*/ `<img class="img-fluid d-block mx-auto" loading="lazy" src='/storage/imagenes/contenido/${content['image']}' />`
    }
    // TODO Agregar campos para panel administrativo
    // Si el contenido no tiene una categoria significa que es un contenido
    console.log(content['category'])
    if (content['image'] && content['category'] === undefined) {
        modal_body.innerHTML += /*html*/ `<img class="img-fluid d-block mx-auto" loading="lazy" src='/storage/imagenes/publicaciones/${content['image']}' />`
    }

    if (content['description']) {
        modal_body.innerHTML += /*html*/ ` <h6>
            ${content['description']}
        </h6>`
    }

    if (content['author']) {
        modal_body.innerHTML += /*html*/ `Autor: ${content['author']}<br>`
    }
    if (content['editorial']) {
        modal_body.innerHTML += /*html*/ `Editorial: ${content['editorial']}<br>`
    }
    if (content['matter']) {
        modal_body.innerHTML += /*html*/ `Materia: ${content['matter']}<br>`
    }
    if (admin) {
        if (content['level']) {
            modal_body.innerHTML += /*html*/ `Nivel: ${content['level']}<br>`
        }
        if (content['cdd']) {
            modal_body.innerHTML += /*html*/ `CDD: ${content['cdd']}<br>`
        }
        if (content['isbn']) {
            modal_body.innerHTML += /*html*/ `ISBN: ${content['isbn']}<br>`
        }
        if (content['access']) {
            modal_body.innerHTML += /*html*/ `Acceso: ${content['access']}<br>`
        }
        if (content['file']) {
            modal_body.innerHTML += /*html*/ `
            Nombre archivo: ${content['file']}<br>
            `
        }
    }
    if (content['link']) {
        modal_body.innerHTML += /*html*/ `Link: <a href="${content['link']}">${content['link']}</a><br>`
    }
    if (date) {
        modal_body.innerHTML += /*html*/ `Fecha de publicacion: <br>${date}</br><br>`
    }

    if (content['subcategory']) {
        modal_body.innerHTML += /*html*/ `
                Subcategoría: <a href="/subcategoria/${content['subcategory_id']}/contenidos">${content['subcategory']['title']}</a>
            <br>`
    }
    if (content['category']) {
        modal_body.innerHTML += /*html*/ `
                Categoría: <a href="/categoria/${content['category_id']}">${content['category']['title']}</a>
            <br>`
    }
    if (content['file']) {
        modal_body.innerHTML += /*html*/ `
            <div class="mt-3">
                <a class="btn btn-outline-info" href="descargar/${content['id']}">
                    <i class="fas fa-download"></i>
                    Descargar
                </a>
            </div>
            `
    }
}