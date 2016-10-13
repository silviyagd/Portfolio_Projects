/**
 * Created by Silviya on 6/27/2016.
 */


var headerHeight = $('navbar').height();

/*Animation for scrolling header*/
$(window).scroll(function() {
    /*   alert("scroll");*/
    if ($(this).scrollTop() > headerHeight*0.1) {
        $('.navbar.navbar-default.divBlock').addClass('scrollHeader');

        $('.navbar #information').hide();
        $('#logoTitle').removeClass('col-md-7');
        $('#logoTitle').addClass('col-md-3');

        $(".navbar #headerTitle h2").css('font-size','1.5em');

        $('.navbar img').css('width' , '80px');
        $('.navbar img').css('height' , '40px');

        $('.navbar h2').css('font-size' , '1.3em');
        $('.navbar h2').css('line-height' , '10%');

        $('.navbar-collapse').removeClass('navbar-collapseClear');
        $('.navbar-collapse ul li').css('width','14%');
        $('.navbar-collapse ul li').css('display','inline-block');
        $('.navbar-navS').css('width','110%');
        $('.navbar-navS').css('padding-top','10px');

        $('.langue a').css('color','#222D1C');

    } else {
        $('.navbar').removeClass('scrollHeader');

        $('.navbar #information').show();

        $('#logoTitle').removeClass('col-md-3');
        $('#logoTitle').addClass('col-md-7');
        $(".navbar #headerTitle h2").css('font-size','3em');
        $('.navbar h2').css('line-height' , '40%');

        $('.navbar-collapse').addClass('navbar-collapseClear');

        $('.navbar img').css('width' , '150px');
        $('.navbar img').css('height' , '90px');
        $('.navbar-navS').css('width','100%');
        $('.navbar-navS').css('padding-top','0');
        /*  $('.navbar').addClass('scrollHeaderRev');*/
        $('.langue a').css('color','white');
    }
});

