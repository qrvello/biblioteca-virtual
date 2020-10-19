<div class="file-upload">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
        Agregar imagen
    </button>

    <div class="image-upload-wrap" style="display: none;">
    <input class="file-upload-input" type="file" name="image" value="{{$content->image}}" onchange="readURL(this);" />
        <div class="drag-text">
            <h3>Arrastra y suelta una imagen o seleccionala</h3>
        </div>
    </div>
    <div class="file-upload-content" style="display: block;">
        <img class="file-upload-image" src="{{ asset('/storage/imagenes/contenido/'.$content -> image) }}" style="display: block;" />
        <div class="image-title-wrap">
            <button type="button" onclick="removeUpload()" class="remove-image">Borrar
                <span class="image-title">{{ $content->image }}</span></button>
        </div>
    </div>
</div>
