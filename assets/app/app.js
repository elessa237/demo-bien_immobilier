import './styles/app.scss';
import 'bootstrap/dist/js/bootstrap';
import '@fortawesome/fontawesome-free/js/all';
import 'jquery';
import 'select2/dist/js/select2';
$('select').select2();
let $contactButton = $('#contactButton')
$contactButton.click(e => {
    e.preventDefault()
    $('#contactForm').slideDown();
    $contactButton.slideUp();
})