import './styles/admin.scss';
import 'bootstrap/dist/js/bootstrap'
import './adminJs/adminlte.min';
import './adminJs/demo';
import 'jquery';
import '@fortawesome/fontawesome-free/js/all';
import './adminJs/jquery.overlayScrollbars.min';
$(document).ready(function () {
    $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
    })
})