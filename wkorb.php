
<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta http-equiv="content-type" content="text/html; charset=UTF-8" >    
    <title>msn.ldkf.de</title>

    <link href="css/bootstrap.css" rel="stylesheet">
	 <script src="js/bootstrap.js"></script>
	 <style>
#show{
z-index: 0;
text-decoration: underline;
color:white;
font-weight: bold;
padding: 4px;
font-size: 12pt;
background-color: black;
position: relative;

float: left;
}	 
#picture{
height: 200px;
}
 .insertframe{
	vertical-align:middle;
   text-align: center; 
   color: black;
}
#fixiert{
 	overflow:auto;
   position:fixed;
	width: 100%;
   min-width: 900px;
   z-index: 1;
}
#table1 td {
	padding: 5px;
	width:25%;
	vertical-align:top;
   text-align: left;
	}
#table1 {
	width:100%; 

}
 html, body {background:no-repeat fixed;
min-width:900px;
height:100%;
 }
	 
	 </style>
  </head>
  <body>
  
   <div id="fixiert">
		<nav class="navbar navbar-inverse">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
      <a class="navbar-brand" href="http://ldkf.de">LDKF.de</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" action="/wk.php" method="post">
        <button type="submit" class="btn btn-primary">Zum Warenkorb</button>
        </form>
        <form class="navbar-form navbar-left" action="/intern.php" method="post">
        <button type="submit" class="btn btn-primary">Ausloggen</button>
        <input type="hidden" value="1" name="logout">
      </form>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 </div>
 
  <div class="container" style=" padding-top:80px; padding-bottom:40px; background-color: rgba(43, 120, 36, 0.9); min-width:900px; min-height:100%;">

      <div class="masthead" style="padding:10px;">
	      <div class="jumbotron" style="color:white; background-color: rgba(0, 0, 0, 1); box-shadow: 0px 5px 9px 5px #000;border-radius: 5px;">
        	<p style="font-size: 41pt;">Willkommen auf der Bestellseite</p>
      	<p class="lead">Hier kannst du Essen bestellen.</p>
       	<p class="lead">Das Prinzip ist das gleiche, wie auf der Wesbite vom Men&uuml;service Neuburg.</p>
       	<p class="lead">Du kannst auch weiterhin auf der <a href="http://menue-service-neuburg.de/ " target="_blank">Seite vom Essenanbieter</a> bestellen.</p>
      </div>       
       
      </div>
      <div  class="container" >
     <form action="/intern.php" method="post">        
	  
        </form>      
   </div>
       </div>
        
      <footer class="footer" style="background-color:#222; margin-bottom:0px; min-width:800px;padding-top:2px; padding-bottom:2px;padding-left:40px;padding-right:40px;width:100%; bottom: 0; ">
       <p style="color:white;">        Version  <?php include 'version.php';?>  - erstellt mit Bluefish und Bootstrap - umgesetzt von Dominik Eichler und Alwin Ebermann</p>
              <p class="text-muted"> <a  href="https://ldkf.de//de/impressum.html" target="_blank">Impressum</a> - <a target="_blank" href="https://ldkf.de//de/datenschutzerklaerung.html" >Datenschutz</a> - <a href="Information.php" target="_blank">&Uuml;ber diese Seite</a>      </p>  
   </footer>

     <!-- /container -->
    
  </body>
</html>
