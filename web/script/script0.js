$(document).ready(function () {
    $('.hover').on('touchstart touchend', function (e) {
        e.preventDefault();
        $(this).toggleClass('touch');
    });
});