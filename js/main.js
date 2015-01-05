jQuery.noConflict(false);
$ = jQuery;

$(document).ready(function(){
    //alert($(window).width());

    // $('.masonry-block').masonry({
    //   itemSelector: 'li'
    // });
    var section = $('dl.accordion dd');

    if($( '> a' ,section).length <= 1) section.addClass('active').children('.sub-section').stop(true, false).slideDown(400);

    $('dl.accordion dd > a').click(function(event) {
        var accordion = $(this).parent().parent();
        if($(this).parent().hasClass('active')) {
            $('dd.active', accordion).removeClass('active').children('.sub-section').stop(true, false).slideUp(400);
        }else{
            $('dd.active', accordion).removeClass('active').children('.sub-section').stop(true, false).slideUp(400);
            $(this).parent().addClass('active').children('.sub-section').stop(true, false).slideDown(400);
        }
        event.preventDefault();
    });

    $('header.main .mobile').click(function(event) {
        $(this).add($(this).next('nav')).toggleClass('active');
        event.preventDefault();
    });
});

function send_doc() {
    $('#downloadLink').attr('href', $('#plaquetteLink').attr('data-link'));
    $('#downloadDocs').foundation('reveal', 'open');
}