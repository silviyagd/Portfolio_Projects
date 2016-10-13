/**
 * Created by Silviya on 1/13/2016.
 */

function menuClick0(){

    document.getElementById('menu0').style.width = "91%";
    document.getElementById('menu1').style.width = "3%";
    document.getElementById('menu2').style.width = "3%";
    document.getElementById('menu3').style.width = "3%";

    document.getElementById('content-menu1').style.display = "none";
    document.getElementById('content-menu2').style.display = "none";
    document.getElementById('content-menu3').style.display = "none";
    document.getElementById('content-menu0').style.display = "block";

    document.getElementById('menu0').style.transition = "all 2s";

    $("#menu1").insertAfter("#menu0");
    $("#menu2").insertAfter("#menu1");
    $("#menu3").insertAfter("#menu2");

    document.getElementById('logo_img').src     = "./images/logo_Bl.png";
    document.getElementById('silviya_img').src  = "./images/image-SSS_Bl.png";
    document.getElementById('icon_css').src     = "./images/icon_css_or.png";

}

function menuClick1(){
    document.getElementById('menu0').style.width = "3%";
    document.getElementById('menu1').style.width = "91%";
    document.getElementById('menu2').style.width = "3%";
    document.getElementById('menu3').style.width = "3%";


    document.getElementById('content-menu0').style.display = "none";
    document.getElementById('content-menu2').style.display = "none";
    document.getElementById('content-menu3').style.display = "none";
    document.getElementById('content-menu1').style.display = "block";

    document.getElementById('menu1').style.transition = "all 2s";

    $("#menu2").insertAfter("#menu1");
    $("#menu3").insertAfter("#menu2");
    $("#menu0").insertAfter("#menu3");

    document.getElementById('logo_img').src     = "./images/logo_Bl.png";
    document.getElementById('silviya_img').src  = "./images/image-SSS_Bl.png";
    document.getElementById('icon_css').src     = "./images/icon_css_or.png";
}


function menuClick2(){
    document.getElementById('menu0').style.width = "3%";
    document.getElementById('menu1').style.width = "3%";
    document.getElementById('menu2').style.width = "91%";
    document.getElementById('menu3').style.width = "3%";

    document.getElementById('content-menu0').style.display = "none";
    document.getElementById('content-menu1').style.display = "none";
    document.getElementById('content-menu3').style.display = "none";
    document.getElementById('content-menu2').style.display = "block";

    document.getElementById('menu2').style.transition = "all 2s";

    $("#menu3").insertAfter("#menu2");
    $("#menu0").insertAfter("#menu3");
    $("#menu1").insertAfter("#menu0");

    document.getElementById('logo_img').src     = "./images/logo_Or.png";
    document.getElementById('silviya_img').src  = "./images/image-SSS_Or.png";
    document.getElementById('icon_css').src     = "./images/icon_css_bl.png";
}


function menuClick3(){
    document.getElementById('menu0').style.width = "3%";
    document.getElementById('menu1').style.width = "3%";
    document.getElementById('menu2').style.width = "3%";
    document.getElementById('menu3').style.width = "91%";

    document.getElementById('content-menu0').style.display = "none";
    document.getElementById('content-menu1').style.display = "none";
    document.getElementById('content-menu2').style.display = "none";

    document.getElementById('menu3').style.transition = "all 2s";

    document.getElementById('content-menu3').style.display = "block";
  //  document.getElementById('content-menu3').className = "contentVisible";


    $("#menu0").insertAfter("#menu3");
    $("#menu1").insertAfter("#menu0");
    $("#menu2").insertAfter("#menu1");

    document.getElementById('logo_img').src     = "./images/logo_Or.png";
    document.getElementById('silviya_img').src  = "./images/image-SSS_Or.png";
    document.getElementById('icon_css').src     = "./images/icon_css_bl.png";
}

