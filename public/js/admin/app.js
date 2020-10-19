function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function removeUpload() {
    $('.file-upload-input').val(null);
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();

}
$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});


// Detecta cambios en select-category
$(function() {
    $('#select-category').on('change', onSelectCategoryChange);
});

// Select dinámico según categoría seleccionada.
function onSelectCategoryChange() {
    const category_id = $(this).val();
    // AJAX
    $.get('/api/categoria/'+category_id+'/subcategorias', function (data) {
        var html_select = '';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="'+data[i].id+'">'+data[i].title+'</option>';
            if (data.length >= 1) {
                $('#select-subcategory').prop('disabled', false);
            } else {
                $('#select-subcategory').prop('disabled', 'disabled');
            }
        $('#select-subcategory').html(html_select);
    });
}
