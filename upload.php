<?php
	session_start();
	if(isset($_POST['kdnrv']) and isset($_POST['geheim']) and $_POST['geheim']!="" and $_POST['kdnrv']!="" ) {
		$_SESSION['kdnrv'] = $_POST['kdnrv'];
		$_SESSION['geheim'] = $_POST['geheim'];
		header('Location: intern.php'); 
}
 			include 'includes/eintrag.php';

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta http-equiv="content-type" content="text/html; charset=UTF-8" >    
    <title>msn.ldkf.de - Uploader</title>

   
    <link href="css/bootstrap.css" rel="stylesheet">
	 <script src="js/bootstrap.js"></script>
	 <script type="text/javascript">
		function chkFormular () {
		if (document.eintr.Essenname.value == "Keine Auswahl"){
    		alert("Es wurde noch kein Essen ausgew\u00e4hlt");
    		document.eintr.Essenname.focus();
    		return false;
  																				}
  
 		if (document.eintr.datei.value == "")  {
    		alert("Es wurde noch kein Bild ausgew\u00e4hlt.");
    		document.eintr.datei.focus();
    		return false;
  															}
										}			
	</script> 
	<script type="text/javascript">
 		function fileThumbnail(files)
		{
			var thumb = document.getElementById("thumbnail");
 			thumb.innerHTML = "";
			if(!files)
			return;
 			for(var i = 0; i < files.length; i++)
				{
				var file = files[i];
 				if(!file.type.match(/image.*/))
				continue;
 			var img = document.createElement("img");
			var reader = new FileReader();
 			reader.onload = (function(tImg) {
			return function(e) {
			tImg.src = e.target.result;
			};
			})(img);
 				reader.readAsDataURL(file);
 				img.width = 400; 
				thumb.appendChild(img);
				}
		}
	 </script>
	 <style>
		#show {
			font-size: 14pt;
			padding: 3px;
			z-index: 0;
			background-color: rgba(0, 0, 0, 0.8);
			color:white;
				}	 
		#picture {
			height: 200px;
					}
		.select{
      	text-align: left;
       	width:265pt;
        		}
		.fett {
   		font-weight: bold;
   		color: red;
   		text-align: left;
   		width:265pt;
				}
		#fixiert {
   		position:fixed;
			width: 100%;
   		min-width: 900px;
   		z-index: 1;
					}
		html, body  {
			background:no-repeat fixed;
			min-width:900px;
			height:100%;
 						}
	 </style>
  </head>
  <body>
  		<div id="fixiert">
			<nav class="navbar navbar-inverse navbar-fixed-top">
			  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    				<div class="navbar-header">
     					<a class="navbar-brand" href="http://ldkf.de">LDKF.de</a>
    				</div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    				<div class="" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" >
        <li><a href="./">Startseite<span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="upload.php">Uploader</a></li>
         
         
     <?php if(!isset($_SESSION['id'])) {
     	echo '</ul>
      <ul class="nav navbar-nav navbar-right">
        <form method="post" class="navbar-form navbar-left" action="?" >
        <div class="form-group">
          <input autocomplete="off" type="text" name="kdnrv" class="form-control" placeholder="Kundennummer">
          <input autocomplete="off" type="password" name="geheim" class="form-control" placeholder="Geheimzahl">

        <button type="submit" class="btn btn-primary">Einloggen</button>        </div>
      </form>
        
      </ul>';
      } else {
echo '
		<li><a href="intern.php">Bestellseite</a></li>
		</ul>

<ul class="nav navbar-nav navbar-right" style="vertical-align:middle;"><form class="navbar-form navbar-left">
   <a href="/intern.php?l=1" class="btn btn-primary " style="margin-left:20px;">Ausloggen</a>		
     </ul></form>

      ';      
      }
      ?>
    </div>
    <!-- /.navbar-collapse -->
  				</div>
  <!-- /.container-fluid -->
			</nav>
		</div>
		<div class="container" style=" height:auto; padding-top:80px; background-color: rgba(43, 120, 36, 0.9); min-width:900px; min-height:100%;">
	      <div class="masthead" style="padding:10px;">
		      <div class="jumbotron" style="color:white; background-color: rgba(0, 0, 0, 1); box-shadow: 0px 5px 9px 5px #000;border-radius: 5px;">
      		  	<p style="font-size: 41pt;">Willkommen auf der Upload-Seite</p>
      			<p class="lead">Hier kannst du Bilder vom Essen hochladen.</p>
       			<p class="lead">Du kannst es aus der Liste wählen, oder auf der Startseite<br>das passende Essen auswählen.</p>
      		</div>       
			</div>
         <div class="row" style="color:black; margin-bottom:30px; width:100%;">
         	<div class="col-xs-10" style="background-color:white; width:50%; padding-top:40px; padding-bottom:40px;float:left; position:relative;" >
       <!-- Jumbotron -->
      			<form style="font-family:Ubuntu; " method="post" name="eintr" enctype="multipart/form-data" action="" onsubmit="return chkFormular()">
               	<select name="Essenname" class="select">
						<?php

						$datum_anzeige = explode('-',$datum); $value_date = $datum_anzeige[2].'.'.$datum_anzeige[1].'.'.$datum_anzeige[0]; 
						$pfad1="";
						$result1 = mysql_query("SELECT name FROM essen WHERE id LIKE '$pfada'");
     						while($row1 = mysql_fetch_row($result1))
							$pfad1 = $row1[0];
							$pfad2="";
						$result2 = mysql_query("SELECT name FROM essen WHERE id LIKE '$pfadb'");
							while($row2 = mysql_fetch_row($result2))
							$pfad2 = $row2[0];
							$pfad3="";
						$result3 = mysql_query("SELECT name FROM essen WHERE id LIKE '$pfadc'");
     						while($row3 = mysql_fetch_row($result3))
							$pfad3 = $row3[0];
							$pfad4="";
						$result4 = mysql_query("SELECT name FROM essen WHERE id LIKE '$pfadd'");
     						while($row4 = mysql_fetch_row($result4))
							$pfad4 = $row4[0];      
      
						$change_month="00";
   					if( isset ($_GET['n'])) {
   							echo '<option>';
 								$n=  $_GET['n'];
								if($n==1) {  echo $pfad1;} 
								else { 
									if($n==2) {echo  $pfad2;}
									else {
										if($n==3) {echo $pfad3;}	
										else {
											if($n==4) {echo $pfad4;}
											}}}
	 							echo '</option">';
														}
						else {
							echo"<option selected>Keine Auswahl</option>";
							$result = mysql_query("SELECT datum FROM datum Where bez LIKE 'a' ORDER BY datum ASC ");
      						while($row = mysql_fetch_row($result)){
        							$resultd = mysql_query("SELECT id FROM datum WHERE datum LIKE '$row[0]'   ");
        							while($rowd = mysql_fetch_row($resultd)){
    									$resultda = mysql_query("SELECT name FROM essen WHERE id LIKE '$rowd[0]'   ");
        								while($rowda = mysql_fetch_row($resultda)){
    									if(isset($row[1])){
    				    					$select_anzeige= htmlentities($row[0]).''. htmlentities($row[1]);
    															}
    									else {
    				    					$select_anzeige= htmlentities($row[0]);			
    							  				}
										$y = explode('-',$select_anzeige);     $sel= $y[2].'.'.$y[1].'.'.$y[0]; 
					
										if($y[1]==01) {$monat_select="Januar";	}
										if($y[1]==02) {$monat_select="Februar";	}				
										if($y[1]==03) {$monat_select="M&auml;rz";	}				
										if($y[1]==04) {$monat_select="April";	}				
										if($y[1]==05) {$monat_select="Mai";	}				
										if($y[1]==06) {$monat_select="Juni";	}				
										if($y[1]==07) {$monat_select="Juli";	}				
										if($y[1]==8) {$monat_select="August";	}				
										if($y[1]==9) {$monat_select="September";	}				
										if($y[1]==10) {$monat_select="Oktober";	}				
										if($y[1]==11) {$monat_select="November";	}				
										if($y[1]==12) {$monat_select="Dezember";	}				
										
										if($change_month!=$y[1]) {
											$change_month=$y[1]; 
										$month_changed=1;
																		} 
										else {
										$month_changed=0;
												}
									if($month_changed==1) {
		 								echo'</optgroup>';
										echo'<optgroup label="';echo $monat_select;echo '">'; 
											if($sel==$value_date) {
												echo '<option class="fett">(' .$sel.') '. htmlentities($rowda[0]).'</option>';
																		}  
											else {
 												echo '<option class="option">(' .$sel.') '. htmlentities($rowda[0]).'</option>';
													}
																}
									else { 
										if($sel==$value_date) {
 											echo '<option class="fett">(' .$sel.') '. htmlentities($rowda[0]).'</option>';
																	} 
										else {
 											echo '<option class="option">(' .$sel.') '. htmlentities($rowda[0]).'</option>';
												}
											} 			
 		 																					}
 		 																				}
 		 																			}
   						}
						?>        
      				</select>
      				<input type="file"  name="datei" accept="image/*" multiple onChange="fileThumbnail(this.files);">
						<input type="hidden" name="meldung" value="1"> 
						<br>
						<br>
      				<input class="btn btn-primary" value="Bild Hochladen" type="submit"> 
      			</form>    
     		</div>
   		<div style=" border:solid 4px;border-radius:6px; min-height:300px; width:408px;background-color: rgba(0, 0, 0, 0.5);  position:relative; margin-left:auto; margin-right:0;" id="thumbnail"></div>   
      </div>
     </div>
		<!-- Site footer -->
     	<footer class="footer" style="background-color:#222; margin-bottom:0px; min-width:800px;padding-top:2px; padding-bottom:2px;padding-left:40px;padding-right:40px;width:100%; bottom: 0; ">
     		<p style="color:white;">Version  <?php include 'includes/version.php';?>  - erstellt mit Bluefish und Bootstrap - umgesetzt von Dominik Eichler und Alwin Ebermann</p>
         <p class="text-muted"> <a  href="https://ldkf.de//de/impressum.html" target="_blank">Impressum</a> - <a target="_blank" href="https://ldkf.de//de/datenschutzerklaerung.html" >Datenschutz</a> - <a href="Information.php" target="_blank">&Uuml;ber diese Seite</a>      </p>  
   	</footer>
		<!-- /container -->
  </body>
</html>
