/*================================
wow.js
==================================*/
new WOW().init();

/*================================
scroll
==================================*/

$('a[href^="#"]').on('click', function() {
    var id = $(this).attr('href');
    var position = $(id).offset().top;
    console.log(id);
    console.log(position);
    $('html,body').animate({
        scrollTop: position
    },
    300);
});

