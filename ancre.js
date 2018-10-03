$('ul.nav a').on('click', function(e) {
    e.preventDefault();
    var target = $(this).attr('href');
    var pos = $(target).parents('.page').position().left;
    var scrollPercent = (pos / ($('.front.scroll').width() - window.innerWidth)).toFixed(4);
    var top = scrollPercent * ($('body').height() - window.innerHeight);
    $('html, body').animate({scrollTop: top+'px'}, 200);
    });