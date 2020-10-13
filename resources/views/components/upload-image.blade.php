<div class="file-upload">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Agregar
        imagen</button>

    <div class="image-upload-wrap">
        <input class="file-upload-input" type="file" name="image" onchange="readURL(this);" accept="image/*" />
        <div class="drag-text">
            <h3>Arrastra y suelta una imagen o seleccionala</h3>
        </div>
    </div>
    <div class="file-upload-content">
        <img class="file-upload-image" src="#" alt="your image" />
        <div class="image-title-wrap">
            <button type="button" onclick="removeUpload()" class="remove-image">Borrar
                <span class="image-title">Imagen subida</span>
            </button>
        </div>
    </div>
</div>
