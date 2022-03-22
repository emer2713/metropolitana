var base = location.protocol + '//' + location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function() {
    var btn_search = document.getElementById('btn_search');
    var form_search = document.getElementById('form_search');
    if (btn_search) {
        btn_search.addEventListener('click', function(e) {
            e.preventDefault();
            if (form_search.style.display === 'block') {
                form_search.style.display = 'none';
            } else {
                form_search.style.display = 'block';
            }
        });
    }

    //Bold Active sections
    if (route == 'products_edit') {

        var btn_product_file_image = document.getElementById('btn_product_file_image');
        var product_file_image = document.getElementById('product_file_image')
        btn_product_file_image.addEventListener('click', function() {
            product_file_image.click();
        }, false);

        product_file_image.addEventListener('change', function() {
            document.getElementById('form_product_gallery').submit();
        });
    }
    route_active = document.getElementsByClassName('lk-' + route)[0].classList.add('active');


    console.log(btn_deleted);

    var product_file_image = document.getElementById('product_file_image')
    product_file_image.click();

    product_file_image.addEventListener('change', function() {
        document.getElementById('form_product_gallery').submit();
    });
});

function Ngallery(e) {
    product_file_image.click();
}

$(document).ready(function() {
    editor_init('ckeditor');
})


function editor_init(field) {
    CKEDITOR.replace(field, {
        toolbar: [
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', '-', 'Undo', 'Redo'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'BulletedList', 'Strike', 'Image', 'link', 'UnLink', 'Blockquote'] },
            { name: 'document', items: ['CodeSnippet', 'EmojiPanel', 'PreView', 'Source'] },
        ]
    });
}

function delete_object(e) {
    e.preventDefault();
    var object = this.getAttribute('data-object');
    var action = this.getAttribute('data-action');
    var path = this.getAttribute('data-path');
    var url = base + path + '/' + object + '/' + action;
    var title, text, icon;
    if (action == 'delete') {

        title = "¿Estas seguro que quieres eliminar este producto?";
        text = "Recuerda que esta acción eliminara definitivamente el producto.";
        icon = "warning";
    }
    if (action == 'restore') {

        title = "¿Estas seguro que quieres restaurar este producto?";
        text = "Recuerda que esta acción restaurara el producto.";
        icon = "info";
    }
    swal({
            title: title,
            text: text,
            icon: icon,
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                window.location.href = url;

            }
        });



}