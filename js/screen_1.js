function removeClassOnResize() {
    var screenWidth = $(window).width();
    var myElement = $("#homepage_home");
    var logo = $("#logo_size");
    var menu_bar = $(".ChangeMargin");
    var logo_dev = $("#logo_dev");
    var logoLi = $("#logoLi");




    if (screenWidth > 767) {
        myElement.addClass('headerrrrrrrrrrrrr');
        logo.css("width", "100px");
        logo.css("margin-top", "0px");
        // logo_dev.css("left", "50px");
        myElement.css("margin-top", "0px");
        menu_bar.css("margin-top", "0px");
        logo.css("margin-left", "50px");
        
        logoLi.css("display", "none");
        logo_dev.css("display", "");


    } else {
        myElement.removeClass('headerrrrrrrrrrrrr');
        myElement.css("margin-top", "30px");
        logo.css("width", "70px");
        logo_dev.css("left", "0px");
        // logo_dev.css("left", "10px");
        menu_bar.css("margin-top", "30px");
        
        logoLi.css("display", "block");
        logo_dev.css("display", "none");
    }

}

$(window).resize(removeClassOnResize);

$(document).ready(function () {
    var screenWidth = $(window).width();
    var myElement = $("#homepage_home");
    var logo_dev = $("#logo_dev");
    var logo = $("#logo_size");
    var menu_bar = $(".ChangeMargin");
    var logoLi = $("#logoLi");

    if (screenWidth > 767) {
        myElement.addClass('headerrrrrrrrrrrrr');
        myElement.css("margin-top", "0px");
        logoLi.css("display", "none");
        logo_dev.css("display", "");
        logo.css("margin-left", "50px");


    } else {
        myElement.removeClass('headerrrrrrrrrrrrr');
        myElement.css("margin-top", "30px");
        logo.css("width", "70px");
        logo_dev.css("left", "0px");
        menu_bar.css("margin-top", "20px");
        logoLi.css("display", "block");
        logo_dev.css("display", "none");
    }
})