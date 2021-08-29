import './styles/admin.css';
import 'bootstrap/dist/js/bootstrap'
import './adminJs/adminlte.min';
import './adminJs/demo';
import '@fortawesome/fontawesome-free/js/all';
import './adminJs/jquery.overlayScrollbars.min';
import 'jquery';
import 'select2/dist/js/select2';
$('select').select2();
$(document).ready(function () {
    $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})