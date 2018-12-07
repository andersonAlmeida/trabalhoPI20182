$(document).ready(function () {
    // ------------------------------------------------------- //
    // Side Navbar Functionality
    // ------------------------------------------------------ //
    $('#toggle-btn').on('click', function (e) {

        e.preventDefault();

        if ($(window).outerWidth() > 1194) {
            $('nav.side-navbar').toggleClass('shrink');
            $('.page').toggleClass('active');
        } else {
            $('nav.side-navbar').toggleClass('show-sm');
            $('.page').toggleClass('active-sm');
        }
    });


    // Confirmação deleta
    $(".deleta").on("click", function(e) {
        e.preventDefault();

        var r = confirm("Você tem certeza que deseja excluir esse registro?");

        if(r === true) {
            location.href = e.currentTarget.href;
        }
    });
});