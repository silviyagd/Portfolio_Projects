<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Silviya Draganova</title>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <script src="script/script.js"></script>

    <script src="jquery-1.12.0.min.js"></script>



</head>
<body>


<div id="content">

    <div id="content-white">
        <img src="./images/logo_Bl.png" alt="image logo" id="logo_img">
        <img src="./images/image-SSS_Bl.png" alt="image Silviya" id="silviya_img">
        <img src="./images/icon_css_or.png" alt="image CSS Icon" id="icon_css">
    </div>



    <div id="content-body">
        <div id="menu0" >
            <a href="#" class="aFloat" onclick="menuClick0();return false;"> <img src="./images/home.png" alt="image CSS Icon" id="icon_home"></a>
            <div id="content-menu0">
                <div id="content-menu0Ch"> <!--div crated for hide the scrollbar-->
                    <!--
                        <h1>Silviya Draganova</h1>
                        <div><img src="./images/icon_css_bl.png"  width="40px" height="40px" alt="image CSS Icon"><h2>Developeur WEB</h2></div>
                    -->
                <p><span class="bonjour">Bonjour</span>
                    Je m'  appele <span class="monNom">Silviya Draganova</span>.
                    Je suis en train de finir ma formation en coll&egrave;ge Maisonneuve du <span class="monNom">&laquo;WEB Programmation&raquo;</span>.
                    Je suis n&eacute; en Bulgarie et maintenant j'admire l'hiver canadien en Montreal. Je parle <span class="wordsP">trois</span> langues :
                    <span class="wordsP">bulgare, fran&ccedil;ais et anglais</span> ,
                    je suis ouvert a comprendre nouveau aussi.  Qu'est-ce que je peux vous dire pour moi?
                    Je suis motiv&eacute, passionnante, curieuse, cr&eacuteative, obstin&eacutee et tellement positive personne. <span class="sourire">:)</span> J'aime les aventures et d&eacute;fis.
                    Je suis humble aussi, alors je vais m'arret? ici. Si vous augmentez votre int&eacute;r&ecirc;t just un peu ne h&eacute;sitez pas
                    ? me <span class="wordsP"><a href="#" onclick="menuClick3();return false;">contacter</a></span>
                    ou voir mon <span class="wordsP"><a href="#" onclick="menuClick1();return false;">CV</a></span>.
                </p>
            </div>
            </div>
        </div>

        <div id="menu1" >
            <a href="" class="aFloat" onclick="menuClick1();return false;"><img src="./images/cv.png" alt="image CSS Icon" id="icon_cv"></a>
            <div id="content-menu1">
                <div >
                <h1>Silviya Draganova</h1>
                <div id="CVheader"><img src="./images/icon_css_bl.png"  width="40px" height="40px" alt="image CSS Icon"><h2>Developeur WEB</h2></div>
                </div>
                <div id="content-menu1Ch"> <!--div crated for hide the scrollbar-->

                <div class="container-fluid" >
                    <h3><span class="label label-default" style="background-color: #2f496e">OUTILS</span></h3>
                    
                    <div class="row"><hr/></div>
                    
    <!--################################### -->
                    <div class="row">
                    <div class="col-sm-2"></div> 
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">HTML5</span></h4>
                        <canvas id="my_canvasHTML" width="150" height="150"></canvas>
                        <script>
                            var ctxHTML = document.getElementById('my_canvasHTML').getContext('2d');
                            var alHTML = 0;
                            var startHTML = 4.72;
                            var cwHTML = ctxHTML.canvas.width;
                            var chHTML = ctxHTML.canvas.height;
                            var diffHTML;
                            function progressSimHTML(){
                                diffHTML = ((alHTML / 200) * Math.PI*2*10).toFixed(2);
                                ctxHTML.clearRect(0, 0, cwHTML, chHTML);
                                ctxHTML.lineWidth = 13;
                                ctxHTML.fillStyle = '#2f496e';
                                ctxHTML.strokeStyle = "#2f496e";
                                ctxHTML.textAlign = 'center';
                                ctxHTML.fillText(alHTML+'%', cwHTML*0.5, chHTML*0.5+2, cwHTML);
                                ctxHTML.beginPath();
                                ctxHTML.arc(75, 75, 65, startHTML, diffHTML/5+startHTML, false);
                                ctxHTML.stroke();
                                if(alHTML >= 95){
                                    clearTimeout(simHTML);
                                    // Add scripting here that will run when progress completes
                                }
                                alHTML++;
                            }
                            var simHTML = setInterval(progressSimHTML, 80);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">CSS</span></h4>
                        <canvas id="my_canvasCSS" width="150" height="150"></canvas>
                        <script>
                            var ctxCSS = document.getElementById('my_canvasCSS').getContext('2d');
                            var alCSS = 0;
                            var startCSS = 4.72;
                            var cwCSS = ctxCSS.canvas.width;
                            var chCSS = ctxCSS.canvas.height;
                            var diffCSS;
                            function progressSimCSS(){
                                diffCSS = ((alCSS / 200) * Math.PI*2*10).toFixed(2);
                                ctxCSS.clearRect(0, 0, cwCSS, chCSS);
                                ctxCSS.lineWidth = 13;
                                ctxCSS.fillStyle = '#2f496e';
                                ctxCSS.strokeStyle = "#2f496e";
                                ctxCSS.textAlign = 'center';
                                ctxCSS.fillText(alCSS+'%', cwCSS*0.5, chCSS*0.5+2, cwCSS);
                                ctxCSS.beginPath();
                                ctxCSS.arc(75, 75, 65, startCSS, diffCSS/5+startCSS, false);
                                ctxCSS.stroke();
                                if(alCSS >= 90){
                                    clearTimeout(simCSS);
                                    // Add scripting here that will run when progress completes
                                }
                                alCSS++;
                            }
                            var simCSS = setInterval(progressSimCSS, 60);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">PHP(OO)</span></h4>
                        <canvas id="my_canvasPHP" width="150" height="150"></canvas>
                        <script>
                            var ctxPHP = document.getElementById('my_canvasPHP').getContext('2d');
                            var alPHP = 0;
                            var startPHP = 4.72;
                            var cwPHP = ctxPHP.canvas.width;
                            var chPHP = ctxPHP.canvas.height;
                            var diffPHP;
                            function progressSimPHP(){
                                diffPHP = ((alPHP / 200) * Math.PI*2*10).toFixed(2);
                                ctxPHP.clearRect(0, 0, cwPHP, chPHP);
                                ctxPHP.lineWidth = 13;
                                ctxPHP.fillStyle = '#2f496e';
                                ctxPHP.strokeStyle = "#2f496e";
                                ctxPHP.textAlign = 'center';
                                ctxPHP.fillText(alPHP+'%', cwPHP*0.5, chPHP*0.5+2, cwPHP);
                                ctxPHP.beginPath();
                                ctxPHP.arc(75, 75, 65, startPHP, diffPHP/5+startPHP, false);
                                ctxPHP.stroke();
                                if(alPHP >= 85){
                                    clearTimeout(simPHP);
                                    // Add scripting here that will run when progress completes
                                }
                                alPHP++;
                            }
                            var simPHP = setInterval(progressSimPHP, 65);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">JavaScript</span></h4>
                        <canvas id="my_canvasJS" width="150" height="150"></canvas>
                        <script>
                            var ctxJS = document.getElementById('my_canvasJS').getContext('2d');
                            var alJS = 0;
                            var startJS = 4.72;
                            var cwJS = ctxJS.canvas.width;
                            var chJS = ctxJS.canvas.height;
                            var diffJS;
                            function progressSimJS(){
                                diffJS = ((alJS / 200) * Math.PI*2*10).toFixed(2);
                                ctxJS.clearRect(0, 0, cwJS, chJS);
                                ctxJS.lineWidth = 13;
                                ctxJS.fillStyle = '#2f496e';
                                ctxJS.strokeStyle = "#2f496e";
                                ctxJS.textAlign = 'center';
                                ctxJS.fillText(alJS+'%', cwJS*0.5, chJS*0.5+2, cwJS);
                                ctxJS.beginPath();
                                ctxJS.arc(75, 75, 65, startJS, diffJS/5+startJS, false);
                                ctxJS.stroke();
                                if(alJS >= 80){
                                    clearTimeout(simJS);
                                    // Add scripting here that will run when progress completes
                                }
                                alJS++;
                            }
                            var simJS = setInterval(progressSimJS, 75);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2"></div> 
                    </div>
                    
                    <div class="row "><hr/></div>
                    
                    <div class="row">
                       <div class="col-sm-2"></div> 
    <!--################################### -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">JQuery</span></h4>
                        <canvas id="my_canvasJQ" width="150" height="150"></canvas>
                        <script>
                            var ctxJQ = document.getElementById('my_canvasJQ').getContext('2d');
                            var alJQ = 0;
                            var startJQ = 4.72;
                            var cwJQ = ctxJQ.canvas.width;
                            var chJQ = ctxJQ.canvas.height;
                            var diffJQ;
                            function progressSimJQ(){
                                diffJQ = ((alJQ / 200) * Math.PI*2*10).toFixed(2);
                                ctxJQ.clearRect(0, 0, cwJQ, chJQ);
                                ctxJQ.lineWidth = 13;
                                ctxJQ.fillStyle = '#2f496e';
                                ctxJQ.strokeStyle = "#2f496e";
                                ctxJQ.textAlign = 'center';
                                ctxJQ.fillText(alJQ+'%', cwJQ*0.5, chJQ*0.5+2, cwJQ);
                                ctxJQ.beginPath();
                                ctxJQ.arc(75, 75, 65, startJQ, diffJQ/5+startJQ, false);
                                ctxJQ.stroke();
                                if(alJQ >= 75){
                                    clearTimeout(simJQ);
                                    // Add scripting here that will run when progress completes
                                }
                                alJQ++;
                            }
                            var simJQ = setInterval(progressSimJQ, 80);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">Ajax</span></h4>
                        <canvas id="my_canvasAjax" width="150" height="150"></canvas>
                        <script>
                            var ctxAjax = document.getElementById('my_canvasAjax').getContext('2d');
                            var alAjax = 0;
                            var startAjax = 4.72;
                            var cwAjax = ctxAjax.canvas.width;
                            var chAjax = ctxAjax.canvas.height;
                            var diffAjax;
                            function progressSimAjax(){
                                diffAjax = ((alAjax / 200) * Math.PI*2*10).toFixed(2);
                                ctxAjax.clearRect(0, 0, cwAjax, chAjax);
                                ctxAjax.lineWidth = 13;
                                ctxAjax.fillStyle = '#2f496e';
                                ctxAjax.strokeStyle = "#2f496e";
                                ctxAjax.textAlign = 'center';
                                ctxAjax.fillText(alAjax+'%', cwAjax*0.5, chAjax*0.5+2, cwAjax);
                                ctxAjax.beginPath();
                                ctxAjax.arc(75, 75, 65, startAjax, diffAjax/5+startAjax, false);
                                ctxAjax.stroke();
                                if(alAjax >= 75){
                                    clearTimeout(simAjax);
                                    // Add scripting here that will run when progress completes
                                }
                                alAjax++;
                            }
                            var simAjax = setInterval(progressSimAjax, 60);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">WordPress</span></h4>
                        <canvas id="my_canvasWP" width="150" height="150"></canvas>
                        <script>
                            var ctxWP = document.getElementById('my_canvasWP').getContext('2d');
                            var alWP = 0;
                            var startWP = 4.72;
                            var cwWP = ctxWP.canvas.width;
                            var chWP = ctxWP.canvas.height;
                            var diffWP;
                            function progressSimWP(){
                                diffWP = ((alWP / 200) * Math.PI*2*10).toFixed(2);
                                ctxWP.clearRect(0, 0, cwWP, chWP);
                                ctxWP.lineWidth = 13;
                                ctxWP.fillStyle = '#2f496e';
                                ctxWP.strokeStyle = "#2f496e";
                                ctxWP.textAlign = 'center';
                                ctxWP.fillText(alWP+'%', cwWP*0.5, chWP*0.5+2, cwWP);
                                ctxWP.beginPath();
                                ctxWP.arc(75, 75, 65, startWP, diffWP/5+startWP, false);
                                ctxWP.stroke();
                                if(alWP >= 75){
                                    clearTimeout(simWP);
                                    // Add scripting here that will run when progress completes
                                }
                                alWP++;
                            }
                            var simWP = setInterval(progressSimWP, 65);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">OpenCart</span></h4>
                        <canvas id="my_canvasOC" width="150" height="150"></canvas>
                        <script>
                            var ctxOC = document.getElementById('my_canvasOC').getContext('2d');
                            var alOC = 0;
                            var startOC = 4.72;
                            var cwOC = ctxOC.canvas.width;
                            var chOC = ctxOC.canvas.height;
                            var diffOC;
                            function progressSimOC(){
                                diffOC = ((alOC / 200) * Math.PI*2*10).toFixed(2);
                                ctxOC.clearRect(0, 0, cwOC, chOC);
                                ctxOC.lineWidth = 13;
                                ctxOC.fillStyle = '#2f496e';
                                ctxOC.strokeStyle = "#2f496e";
                                ctxOC.textAlign = 'center';
                                ctxOC.fillText(alOC+'%', cwOC*0.5, chOC*0.5+2, cwOC);
                                ctxOC.beginPath();
                                ctxOC.arc(75, 75, 65, startOC, diffOC/5+startOC, false);
                                ctxOC.stroke();
                                if(alOC >= 80){
                                    clearTimeout(simOC);
                                    // Add scripting here that will run when progress completes
                                }
                                alOC++;
                            }
                            var simOC = setInterval(progressSimOC, 80);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2"></div> 
                    </div>
   
                    <div class="row "><hr/></div>
                    
                    <div class="row">
                       <div class="col-sm-2"></div> 
    <!--################################### -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">AngularJS</span></h4>
                        <canvas id="my_canvasAJS" width="150" height="150"></canvas>
                        <script>
                            var ctxAJS = document.getElementById('my_canvasAJS').getContext('2d');
                            var alAJS = 0;
                            var startAJS = 4.72;
                            var cwAJS = ctxAJS.canvas.width;
                            var chAJS = ctxAJS.canvas.height;
                            var diffAJS;
                            function progressSimAJS(){
                                diffAJS = ((alAJS / 200) * Math.PI*2*10).toFixed(2);
                                ctxAJS.clearRect(0, 0, cwAJS, chAJS);
                                ctxAJS.lineWidth = 13;
                                ctxAJS.fillStyle = '#2f496e';
                                ctxAJS.strokeStyle = "#2f496e";
                                ctxAJS.textAlign = 'center';
                                ctxAJS.fillText(alAJS+'%', cwAJS*0.5, chAJS*0.5+2, cwAJS);
                                ctxAJS.beginPath();
                                ctxAJS.arc(75, 75, 65, startAJS, diffAJS/5+startAJS, false);
                                ctxAJS.stroke();
                                if(alAJS >= 50){
                                    clearTimeout(simAJS);
                                    // Add scripting here that will run when progress completes
                                }
                                alAJS++;
                            }
                            var simAJS = setInterval(progressSimAJS, 55);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">ASP.Net</span></h4>
                        <canvas id="my_canvasASP" width="150" height="150"></canvas>
                        <script>
                            var ctxASP = document.getElementById('my_canvasASP').getContext('2d');
                            var alASP = 0;
                            var startASP = 4.72;
                            var cwASP = ctxASP.canvas.width;
                            var chASP = ctxASP.canvas.height;
                            var diffASP;
                            function progressSimASP(){
                                diffASP = ((alASP / 200) * Math.PI*2*10).toFixed(2);
                                ctxASP.clearRect(0, 0, cwASP, chASP);
                                ctxASP.lineWidth = 13;
                                ctxASP.fillStyle = '#2f496e';
                                ctxASP.strokeStyle = "#2f496e";
                                ctxASP.textAlign = 'center';
                                ctxASP.fillText(alASP+'%', cwASP*0.5, chASP*0.5+2, cwASP);
                                ctxASP.beginPath();
                                ctxASP.arc(75, 75, 65, startASP, diffASP/5+startASP, false);
                                ctxASP.stroke();
                                if(alASP >= 45){
                                    clearTimeout(simASP);
                                    // Add scripting here that will run when progress completes
                                }
                                alASP++;
                            }
                            var simASP = setInterval(progressSimASP, 75);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">Adobe CC</span></h4>
                        <canvas id="my_canvasAdobe" width="150" height="150"></canvas>
                        <script>
                            var ctxAdobe = document.getElementById('my_canvasAdobe').getContext('2d');
                            var alAdobe = 0;
                            var startAdobe = 4.72;
                            var cwAdobe = ctxAdobe.canvas.width;
                            var chAdobe = ctxAdobe.canvas.height;
                            var diffAdobe;
                            function progressSimAdobe(){
                                diffAdobe = ((alAdobe / 200) * Math.PI*2*10).toFixed(2);
                                ctxAdobe.clearRect(0, 0, cwAdobe, chAdobe);
                                ctxAdobe.lineWidth = 13;
                                ctxAdobe.fillStyle = '#2f496e';
                                ctxAdobe.strokeStyle = "#2f496e";
                                ctxAdobe.textAlign = 'center';
                                ctxAdobe.fillText(alAdobe+'%', cwAdobe*0.5, chAdobe*0.5+2, cwAdobe);
                                ctxAdobe.beginPath();
                                ctxAdobe.arc(75, 75, 65, startAdobe, diffAdobe/5+startAdobe, false);
                                ctxAdobe.stroke();
                                if(alAdobe >= 75){
                                    clearTimeout(simAdobe);
                                    // Add scripting here that will run when progress completes
                                }
                                alAdobe++;
                            }
                            var simAdobe = setInterval(progressSimAdobe, 80);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2">
                        <h4><span class="label label-default" style="background-color: #2f496e">Agile (Scrum)</span></h4>
                        <canvas id="my_canvasAgile" width="150" height="150"></canvas>
                        <script>
                            var ctxAgile = document.getElementById('my_canvasAgile').getContext('2d');
                            var alAgile = 0;
                            var startAgile = 4.72;
                            var cwAgile = ctxAgile.canvas.width;
                            var chAgile = ctxAgile.canvas.height;
                            var diffAgile;
                            function progressSimAgile(){
                                diffAgile = ((alAgile / 200) * Math.PI*2*10).toFixed(2);
                                ctxAgile.clearRect(0, 0, cwAgile, chAgile);
                                ctxAgile.lineWidth = 13;
                                ctxAgile.fillStyle = '#2f496e';
                                ctxAgile.strokeStyle = "#2f496e";
                                ctxAgile.textAlign = 'center';
                                ctxAgile.fillText(alAgile+'%', cwAgile*0.5, chAgile*0.5+2, cwAgile);
                                ctxAgile.beginPath();
                                ctxAgile.arc(75, 75, 65, startAgile, diffAgile/5+startAgile, false);
                                ctxAgile.stroke();
                                if(alAgile >= 85){
                                    clearTimeout(simAgile);
                                    // Add scripting here that will run when progress completes
                                }
                                alAgile++;
                            }
                            var simAgile = setInterval(progressSimAgile, 65);
                        </script>
                    </div>
<!--############################################# -->
                    <div class="col-sm-2"></div> 
                    </div>
                </div> <!-- class="container-fluid"  -->
               </div>

            </div>

        </div>

        <div id="menu2">
            <a href="#" class="aFloat" onclick="menuClick2();return false;"><img src="./images/portfolio.png" alt="image CSS Icon" id="icon_portfolio"></a>
            <div id="content-menu2">
                <h1>Mes travaux et exp&eacute;rience</h1>
                <!--    <div><img src="./images/icon_css_or.png"  width="40px" height="40px" alt="image CSS Icon"><h2>Developeur WEB</h2></div> -->

            <div id="content-menu2Ch"> <!--div crated for hide the scrollbar-->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="./!projects/TP_Form_Credit_Cards/"/><img class="img-circle" src="./images/portfolio/TP_Form_Credit_Cards.jpg"  width="200px" height="200px" alt="Responsive Site"></a>
                    <h4>
                        <a href="./!projects/TP_Form_Credit_Cards/">Site web responsive</a>
                    </h4>
                    <p>HTML</p>
                    <p>CSS</p>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="./!projects/CSS_Selectors/"/><img class="img-circle" src="./images/portfolio/responsiveSite_PScrn.jpg"  width="200px" height="200px" alt="Responsive Site"></a>
                    <h4>
                        <a href="./!projects/CSS_Selectors/">Site web responsive</a>
                    </h4>
                    <p>HTML</p>
                    <p>CSS</p>
                </div>

                <div class="col-sm-8 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="./!projects/Website_Ergonomie/"><img class="img-circle" src="./images/portfolio/ergonomie_PScrn.jpg"  width="200px" height="200px" alt="Ergonomie"></a>
                    <h4>
                        <a href="./!projects/Website_Ergonomie/">Ergonomie et design</a>
                    </h4>
                   <p>HTML</p>
                    <p>CSS</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="./!projects/ProjWeb1/WEB_Proj1/"><img class="img-circle" src="./images/portfolio/adminWebProj_PScrn.jpg"  width="200px" height="200px" alt="Web Project Admin"></a>
                    <h4>
                        <a href="./!projects/ProjWeb1/WEB_Proj1/">Web Project Admin</a>
                    </h4>
                    <p>HTML</p>
                    <p>CSS</p>
                    <p>PHP MVC</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3 ">
                    <a class="img-responsive" style="width:100%" href="./!projects/ProjWeb1/WEB_Proj1_parents/"><img class="img-circle" src="./images/portfolio/clientWebProj_PScrn.jpg"  width="200px" height="200px" alt="Web Project Client"></a>
                    <h4>
                        <a href="./!projects/ProjWeb1/WEB_Proj1_parents/">Web Project Camps de Jours</a>
                    </h4>
                    <p>HTML</p>
                    <p>CSS</p>
                    <p>PHP MVC</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="http://bitnami-nginxstack-b28d.cloudapp.net/"><img class="img-circle" src="./images/portfolio/sidekick.jpg"  width="200px" height="200px" alt="Wordpress site"></a>
                    <h3>
                        <a href="http://bitnami-nginxstack-b28d.cloudapp.net/">Wordpress theme</a>
                    </h3>
                    <p>WordPress</p>
                    <p>PHP</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="http://e1595060.webdev.cmaisonneuve.qc.ca/!PortfolioProjets/Livres_JavaScript_Ajax/"><img class="img-circle" src="./images/portfolio/ajax_jquery.jpg"  width="200px" height="200px" alt="Formulaire avec ajax"></a>
                    <h4>
                        <a href="http://e1595060.webdev.cmaisonneuve.qc.ca/!PortfolioProjets/Livres_JavaScript_Ajax/">Formulaire - Ajax et Jquery</a>
                    </h4>
                    <p>Ajax</p>
                    <p>JQuery</p>
                    <p>PHP MVC</p>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="./!projects/TP_Web_Session_Questions/"><img class="img-circle" src="./images/portfolio/webdyn3.jpg"  width="200px" height="200px" alt="Formulaire avec session"></a>
                    <h4>
                        <a href="./!projects/TP_Web_Session_Questions/">Formulaire - Orient&eacute; objets et Sessions</a>
                    </h4>
                    <p>PHP Oriente Objects</p>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a class="img-responsive" style="width:100%" href="./!projects/camping/"><img class="img-circle" src="./images/portfolio/camping.jpg"  width="200px" height="200px" alt="Formulaire avec session"></a>
                    <h4>
                        <a href="./!projects/camping/">Projet - Camping Les Acres Verts</a>
                    </h4>
                    <p>HTML</p>
                    <p>Bootstrap</p>
                   <p>Javascript</p>
                    <p>JQuery</p>
                 </div>

            </div>
            </div>
        </div>

        <div id="menu3" >
            <a href="#" class="aFloat" onclick="menuClick3();return false;"> <img src="./images/contact.png" alt="image CSS Icon" id="icon_contacts"></a>
            <div id="content-menu3" class="contentInvisible">
                <h1>Contactez moi</h1>
                <div id="content-menu3Ch"> <!--div crated for hide the scrollbar-->
                    <div id="contact_form">
                    <form id="form4" action="" method="post">

                        <div>
                            <label for="name">Nom</label>
                            <input type="text" name="name" id="name" size="30" />
                            <!--   <label class="error" for="name" id="name_error">This field is required.</label>-->
                        </div>
                        <div>
                            <label for="email">Courriel</label>
                            <input type="text" name="email" id="email" size="30" />
                            <!--    <label class="error" for="name" id="email_error">This field is required.</label>-->
                        </div>
                        <div>
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="50" rows="6"></textarea>
                            <!--   <label class="error" for="name" id="message_error">This field is required.</label>-->
                        </div>

                        <div><button type="submit" id="submit" name="submit">Envoie</button></div>

                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        $name = $_POST['name'];
                        $courel = $_POST['email'];
                        $message = $_POST['message'];

                        try {
                            contacter($name,$courel,$message);

                        }
                        catch (Exception $e){
                        }

                    }
                    function contacter($nom, $courriel, $messageR) {
                        $to = 'silviyagd@gmail.com';
                        $subject = 'Portfolio Contact Message';
                        $message = '<html><head><title>Contact Message</title></head>
                            <body><p>' . $messageR . '</p></body></html>';
                        $headers = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= "To: <georgievas@abv.bg>\r\n";
                        $headers .= 'From: ' . $nom . ' <' . $courriel . '>' . "\r\n";
                        mail($to, $subject, $message, $headers);
                    }
                    ?>


                </div>
            </div>
            </div>
        </div>

    </div>
</div>

<script>

    $('#menu0>a').click(function() {
        /*
         $("#content-menu0").show(2000).fadeIn( 2400 );;
         $("#content-menu1").hide;
         $("#content-menu2").hide;
         $("#content-menu3").hide;
         */
        $("#content-menu0").css({
            "opacity":"0",
            "display":"block"
        }).show().delay(1500).animate({opacity:1});

        $("#icon_css").css({
            "opacity":"0"
        }).show().delay(1500).animate({opacity:0.1})
    });


    $("#menu1 > a").click(function() {
        /*
         $("#content-menu1").show().delay(1500);
         $("#content-menu0").hide;
         $("#content-menu2").hide;
         $("#content-menu3").hide;
         */

        $("#content-menu1").css({
            "opacity":"0",
            "display":"block"
        }).show().delay(1500).animate({opacity:1});

        $("#icon_css").css({
            "opacity":"0"
        }).show().delay(1500).animate({opacity:0.1})

    });

    $("#menu2 > a").click(function() {
        /*
         $("#content-menu2").show().delay(1500);
         $("#content-menu0").hide;
         $("#content-menu1").hide;
         $("#content-menu3").hide;
         */


        $("#content-menu2").css({
            "opacity":"0",
            "display":"block"
        }).show().delay(1500).animate({opacity:1});

        $("#icon_css").css({
            "opacity":"0"
        }).show().delay(1500).animate({opacity:0.1})


    });

    $('#menu3 > a').click(function() {
        alert('test');
        /*
         $("#content-menu3").show().delay(1500);
         $("#content-menu0").hide;
         $("#content-menu1").hide;
         $("#content-menu2").hide;
         */
        $('#content-menu3').css({
            "opacity":"0",
            "display":"block"
        }).show().delay(1500).animate({opacity:1});

        $("'icon_css').css({
            "opacity":"0"
        }).show().delay(1500).animate({opacity:0.1})
    });


    /*
     Send email

     http://blog.teamtreehouse.com/create-ajax-contact-form

</script>
</body>
</html>
