$(document).ready(function() {
    $('#slider').simpleSlider({
        width: 760,
        height: 332
    });
});

function mycarousel_initCallback(carousel)
{
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
}
;

$(document).ready(function() {
    $('#mycarousel').jcarousel({
        auto: 3,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });


});


function mycarousel_initCallback(carousel)
{
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
}
;

$(document).ready(function() {
    $('#mycarousel1').jcarousel({
        auto: 4,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });


});