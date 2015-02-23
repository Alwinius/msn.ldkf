<?php 
session_start();
if(isset($_POST['kdnrv']) and isset($_POST['geheim']) and $_POST['geheim']!="" and $_POST['kdnrv']!="" ) { $_SESSION['kdnrv'] = $_POST['kdnrv']; $_SESSION['geheim'] = $_POST['geheim'];   header('Location: intern.php'); 
  }
  include("includes/db_connect.php");
  include 'includes/datum.php';  
  include 'includes/bewertung.php';

$result_bewa = mysql_query("SELECT bew FROM bewertung WHERE id LIKE '$pfada'");
while($row_bewa = mysql_fetch_row($result_bewa))
if(isset($row_bewa[0])) {
								$a1 =  $row_bewa[0]; 
								$a2=round($a1,2);
								$a3= round($a2,1);
								$bewertga= round($a3,0); 
								}    
								
$result_bewb = mysql_query("SELECT bew FROM bewertung WHERE id LIKE '$pfadb'");
while($row_bewb = mysql_fetch_row($result_bewb))
if(isset($row_bewb[0])) {
								$b1 =  $row_bewb[0]; 
								$b2=round($b1,2);  
								$b3= round($b2,1);
								$bewertgb= round($b3,0); 
								} 

$result_bewc = mysql_query("SELECT bew FROM bewertung WHERE id LIKE '$pfadc'");
while($row_bewc = mysql_fetch_row($result_bewc))
if(isset($row_bewc[0])) {
								$c1 =  $row_bewc[0]; 
								$c2=round($c1,2);  
								$c3= round($c2,1) ; 
								$bewertgc= round($c3,0);  
								}  
         

$result_bewd = mysql_query("SELECT bew FROM bewertung WHERE id LIKE '$pfadd'");
while($row_bewd = mysql_fetch_row($result_bewd))
if(isset($row_bewd[0])) { 
								$d1 =  $row_bewd[0];   
								$d2=round($d1,2);  
								$d3= round($d2,1) ; 
								$bewertgd= round($d3,0); 
								}
    
$boxa1=0;
$boxa2=0;
$boxa3=0;
$boxa4=0;
$boxb1=0;
$boxb2=0;
$boxb3=0;
$boxb4=0;
$boxc1=0;
$boxc2=0;
$boxc3=0;
$boxc4=0;
$boxd1=0;
$boxd2=0;
$boxd3=0;
$boxd4=0;

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
  				$anz_bew_outa=0;		
   			$anz_bew_outb=0;		
   			$anz_bew_outc=0;		
   			$anz_bew_outd=0;		 	
   			$ka=0;
   			$kb=0;
   			$kc=0;
   			$kd=0;			
$image_o="grau.svg";
$image="gelb.svg";   			
   					 
?>          



<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta http-equiv="content-type" content="text/html; charset=UTF-8" > 
	 <meta name="robots" content="index,follow">
 	 <meta name="description" content="">
	 <meta name="keywords" content=""> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>msn.ldkf.de - Startseite</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
	 <script type="text/javascript">

function resettag(tag)
{
    if(tag.value=="<?php  echo  $datum_anzeige[2] ; ?>")
    {
        tag.value="";
    }
} 
function resetmonat(monat)
{
    if(monat.value=="<?php  echo  $datum_anzeige[1] ; ?>")
    {
        monat.value="";
    }
} 
function resetjahr(jahr)
{
    if(jahr.value=="<?php  echo  $datum_anzeige[0] ; ?>")
    {
        jahr.value="";
    }
} 

function resettagback(tag)
{
    if(tag.value=="")
    {
      tag.value="<?php echo  $datum_anzeige[2] ;  ?>"  ;
    }
} 

function resetmonatback(monat)
{
    if(monat.value=="")
    {
      monat.value="<?php echo  $datum_anzeige[1] ;  ?>"  ;
    }
} 

function resetjahrback(jahr)
{
    if(jahr.value=="")
    {
      jahr.value="<?php echo  $datum_anzeige[0] ;  ?>"  ;
    }
} 

</script>
<style>
#show{
	font-size: 14pt;
	padding: 3px;
	z-index: 0;
	background-color: rgba(0, 0, 0, 0.8);
	color:white;
}	
#bewertung {
 height: 10pt;
 width: 250pt; 
 bottom: 8px;
 position: absolute;
 font-size: 10pt;
 margin-bottom: 2px;
 margin-left: 20px;
} 
#picture{
	height: 200px;
}
#fixiert{
	width: 100%;
   min-width: 900px;
   z-index: 1;
	position: fixed;
}
body {
	background:no-repeat fixed;
	min-width:900px;
 }

#socialbookmarksanzeigen {
	background-color: #00CC00;
	padding: 0.4em;
}
#sozialbookmarks {
	background-color: orange;
	padding: 0.4em;
}
</style>


  </head>
  <body>
  <div id="fixiert" >
			<nav class="navbar navbar-inverse navbar-fixed-top">

  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
      <a class="navbar-brand" href="http://ldkf.de">LDKF.de</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" >
        <li class="active"><a href="">Startseite<span class="sr-only">(current)</span></a></li>
        <li><a href="upload.php">Uploader</a></li>
 
     <?php 
if(isset($_SESSION['fail']) and $_SESSION['fail']==1) {
	
echo '</ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="navbar-brand" style="color:red;">Fehler beim Login</li>
        <form method="post" class="navbar-form navbar-left" action="?" >
        <div class="form-group">
          <input autocomplete="off" type="text" name="kdnrv" class="form-control" placeholder="Kundennummer">
          <input autocomplete="off" type="password" name="geheim" class="form-control" placeholder="Geheimzahl">

        <button type="submit" class="btn btn-primary">Einloggen</button>        </div>
      </form>
        
      </ul>';
	
	 }
else {    
     
     if(!isset($_SESSION['id'])) {
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
     </form></ul>

      ';      
      }}
      ?>
    </div>
    
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
 </div>
 
  <div class="container" style=" padding-top:80px; background-color: rgba(43, 120, 36, 0.9); min-width:900px;">

      <div class="masthead" style="padding:10px;">
	      <div class="jumbotron" style="color:white; background-color: rgba(0, 0, 0, 1); box-shadow: 0px 5px 9px 5px #000;border-radius: 5px;">
        	<h1>Willkommen auf msn.ldkf.de</h1>
      	<p class="lead">Hier kannst du ganz bequem dein Essen bestellen.</p>
       	<p class="lead">Welche Vorteile du hast, über uns und nicht direkt beim Menü-Service-Neuburg zu bestellen, siehst du <a>hier</a>.</p><a name="row"></a>
      </div>       
       
      </div>

      <!-- Jumbotron -->
<div class="container" style="background-color:black; color:white; font-size:13pt; padding-right:10px; width:240px; margin-left:0;"> <?php echo $datum_anz.', '.$value_date ; ?> </div>
<form method="post" enctype="multipart/form-data" action="?#row"> 
  <table><tr><td style="padding-right:30px;"><input  class="form-control" style="width:130px;" value="Zu Datum gehen:" type="submit"></td> 
  <td><input class="form-control" style="width:42px;" name="tag" type="text" value="<?php  echo  $datum_anzeige[2] ;  ?>" onfocus="resettag(tag)" onblur="resettagback(tag)" ></td>
  <td><h2>.</h2></td><td><input class="form-control" style="width:42px;" name="monat" type="text" value="<?php  echo  $datum_anzeige[1] ;  ?>" onfocus="resetmonat(monat)" onblur="resetmonatback(monat)"  ></td>
  <td><h2>.</h2></td><td><input class="form-control" style="width:60px;"  name="jahr" type="text" value="<?php  echo  $datum_anzeige[0] ;  ?>" onfocus="resetjahr(jahr)" onblur="resetjahrback(jahr)"  > </form> </td>
  <td style="padding-left:60px;"><a class="btn btn-primary btn-lg active" href="?prev=<?php echo $datum; ?>#row"><<</a></td>
          		   <td style="padding:10px;" ><a class="btn btn-default btn-lg active" href="?#row">Heute / N&auml;chster Schultag</a></td>
         		  <td><a class="btn btn-primary btn-lg active" href="?next=<?php echo $datum; ?>#row">>></a></td></tr>
                 </table>


      <!-- Example row of columns -->
      <div class="row" style="color:black; margin-bottom:30px;">
        <div class="col-xs-10" style="background-color:white;">
         <div id="show">
     <table width="100%" ><tr><td width="90px;">     Men&uuml; A</td><td width="140px;">
         <?php   if(isset($bewertga) and $bewertga >0) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertga) and $bewertga >1) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertga) and $bewertga >2) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertga) and $bewertga >3) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertga) and $bewertga >4) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
			</td><td width="120px;"><font size="2">(<?php   
				$anz_bew_outa=0;
          	$anz_bewa = mysql_query("SELECT anzahl FROM bewertung WHERE id LIKE '$pfada'");
				while($row_anz_bewa = mysql_fetch_row($anz_bewa))
				$anz_bew_outa = $row_anz_bewa[0];           
				echo $anz_bew_outa;
				if ($anz_bew_outa!=1){echo" Bewertungen";} else {echo " Bewertung";}    ?>) 
				</font>        </td><td align="right">
        <?php echo $pfad1;?>	</td></tr></table>			
         </div> 
            <div id="picture">
            
            
<?php
$ordner = "pictures/".$pfada; 
	if ($ordner !=""){
		if(is_dir($ordner)) {
		$allebilder = scandir($ordner); 
		$ka=0; 
		foreach ($allebilder as $bild) { 
		$Tumbnail="";
	   $bildinfo = pathinfo($ordner."/neu/".$bild); 
		   if ($bild != "." && $bild != ".."  && $bild != "_notes" && $bildinfo['basename'] != "Thumbs.db") { 
				$ka= $ka+1; 
	    		if($ka > 3 or $bild=="neu" ) break;
	    		$upload_data_a="";
	    		$uplo = explode('.', $bildinfo['basename'] ); 
   			$upload_data_rowa = mysql_query("SELECT datum FROM bilder WHERE id LIKE '$uplo[0]' ");
   			while($rowupla = mysql_fetch_row($upload_data_rowa))
						$upload_data_a1 = explode('-', $rowupla[0] ); 
						$upload_data_a = "$upload_data_a1[2].$upload_data_a1[1].$upload_data_a1[0]"; 	    
						${'boxa'.$ka} =$ordner."/".$bildinfo['basename'];
						echo '<div class="col-xs-4 thumb">
										<a href="'.$ordner.'/'.$bildinfo['basename'].'"data-lightbox="'. $ordner . '">
                    				<img class="img-responsive" src="'.$ordner."/neu/".$bildinfo['basename'].'" alt="">
                				</a>
            				</div>
          					<div class="modal fade bs-example-modal-lg" id="a'.$ka.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  									<div class="modal-dialog" style="width: 900px;">
            						<div class="modal-content" >
											<div class="modal-header"><div style="margin-bottom:10px">
        									<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
											</div>
      								</div>
      								<img class="img-responsive" src="';  echo  $ordner."/".$bildinfo['basename'];   echo '" alt=""></div>
      							</div>
								</div>';

    }
 }            }        }
	if($ka>3){} else {echo'
            <div class="col-xs-4 thumb">
                <a class="thumbnail" href="upload.php?n=1&datum='; echo $datum; echo '">
                    <img class="img-responsive" src="images/ph.png" alt="">
                </a>
            </div>';}?>
          </div>
<div id="bewertung">
		<?php 
      if(!isset($_COOKIE[$pfada])) {  echo '
      <form method="post" action="?bew='; echo  $pfada;echo "&datum="; echo $datum;echo '"><table cellspacing="1pt" cellpadding="1px">
         <tr> 
         <td>
         <select name="bew_a" class="select" style="height:17pt; width:26pt;">
         <option>-</option>
         <option>0</option>
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         </select></td>
         <td> /5 Sterne</td>
         <td><input style="height:17pt;" name=""'; echo " value='Essen bewerten'"; echo ' type="submit"></td>
         </tr>
         </table>
        </form> ';} else { echo "Essen wurde schon bewertet";}
		?>  
        
         </div>           
          
          
        </div>
        
        <div class="col-xs-10"  style="background-color:white; margin-top:30px;">
         <div id="show">
          <table width="100%"><tr><td width="90px;"> Men&uuml; B</td><td width="140px;">
         <?php   if(isset($bewertgb) and $bewertgb >0) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertgb) and $bewertgb >1) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertgb) and $bewertgb >2) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertgb) and $bewertgb >3) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertgb) and $bewertgb >4) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; }echo " "; ?>
</td><td width="120px;"><font size="2">(<?php 
				$anz_bew_outb=0;
          	$anz_bewb = mysql_query("SELECT anzahl FROM bewertung WHERE id LIKE '$pfadb'");
				while($row_anz_bewb = mysql_fetch_row($anz_bewb))
				$anz_bew_outb = $row_anz_bewb[0];           
				echo $anz_bew_outb;
				if ($anz_bew_outb!=1){echo" Bewertungen";} else {echo " Bewertung";}    ?>)  </font> </td><td align="right">   <?php echo $pfad2;?>  </td></tr></table>
         </div> 
			<div id="picture">
<?php
		$ordner = "pictures/".$pfadb; 
		if ($ordner !=""){
								if(is_dir($ordner)) {
															$allebilder = scandir($ordner); 
															$kb=0;
															foreach ($allebilder as $bild) { 
															$bildinfo = pathinfo($ordner."/".$bild); 

      if ($bild != "." && $bild != ".."  && $bild != "_notes" && $bildinfo['basename'] != "Thumbs.db") { 
 		$kb= $kb+1; 
	   if($kb > 3 or $bild=="neu") break;
	    	    		$upload_data_b="";
	    	    		$uplo = explode('.', $bildinfo['basename'] ); 
	     				$upload_data_rowb = mysql_query("SELECT datum FROM bilder WHERE id LIKE '$uplo[0]' ");
   	while($rowuplb = mysql_fetch_row($upload_data_rowb))
		$upload_data_b1 = explode('-', $rowuplb[0] ); 
		$upload_data_b = "$upload_data_b1[2].$upload_data_b1[1].$upload_data_b1[0]";  
		${'boxb'.$kb} =$ordner."/".$bild;
		echo '<div class="col-xs-4 thumb">
										<a href="'.$ordner.'/'.$bildinfo['basename'].'"data-lightbox="'. $ordner . '">
                    				<img class="img-responsive" src="'.$ordner."/neu/".$bildinfo['basename'].'" alt="">
                				</a>
            				</div>
          					<div class="modal fade bs-example-modal-lg" id="b'.$kb.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  									<div class="modal-dialog" style="width: 900px;">
            						<div class="modal-content" >
											<div class="modal-header"><div style="margin-bottom:10px">
        									<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
											</div>
      								</div>
      								<img class="img-responsive" src="';  echo  $ordner."/".$bildinfo['basename'];   echo '" alt=""></div>
      							</div>
								</div>';
            
            

    }
 }            }        }   
	if($kb>3){} else {echo'
            <div class="col-xs-4 thumb">
                <a class="thumbnail" href="upload.php?n=1&datum='; echo $datum; echo '">
                    <img class="img-responsive" src="images/ph.png" alt="">
                </a>
            </div>';}?>
          </div>
        
<div id="bewertung">
		<?php 
      if(!isset($_COOKIE[$pfadb])) {  echo '
      <form method="post" action="?bew='; echo  $pfadb;echo "&datum="; echo $datum;echo '"><table cellspacing="1pt" cellpadding="1px">
         <tr> 
         <td>
         <select name="bew_b" class="select" style="height:17pt; width:26pt;">
         <option>-</option>
         <option>0</option>
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         </select></td>
         <td> /5 Sterne</td>
         <td><input style="height:17pt;" name=""'; echo " value='Essen bewerten'"; echo ' type="submit"></td>
         </tr>
         </table>
        </form> ';} else { echo "Essen wurde schon bewertet";}
		?>  
        
         </div>        
        
        
        
        </div>
                
        <div class="col-xs-10"  style="background-color:white;margin-top:30px;">
         <div id="show">
          <table width="100%"><tr><td width="90px;"> Men&uuml; C</td><td width="140px;">
         <?php   if(isset($bewertgc) and $bewertgc >0) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertgc) and $bewertgc >1) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertgc) and $bewertgc >2) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertgc) and $bewertgc >3) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertgc) and $bewertgc >4) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; }echo " "; ?>
</td><td width="120px;"><font size="2">(<?php  
				$anz_bew_outc=0;
          	$anz_bewc = mysql_query("SELECT anzahl FROM bewertung WHERE id LIKE '$pfadc'");
				while($row_anz_bewc = mysql_fetch_row($anz_bewc))
				$anz_bew_outc = $row_anz_bewc[0];           
				echo $anz_bew_outc;
				if ($anz_bew_outc!=1){echo" Bewertungen";} else {echo " Bewertung";}    ?>)    </font> </td><td align="right">    <?php echo $pfad3;?> </td></tr></table>
         </div> 
			<div id="picture">
<?php
		$ordner = "pictures/".$pfadc; 
		if ($ordner !=""){
								if(is_dir($ordner)) {
															$allebilder = scandir($ordner); 
															$kc=0;
															foreach ($allebilder as $bild) { 
															$bildinfo = pathinfo($ordner."/".$bild); 

      if ($bild != "." && $bild != ".."  && $bild != "_notes" && $bildinfo['basename'] != "Thumbs.db") { 
 		$kc= $kc+1; 
	   if($kc > 3 or $bild=="neu") break;
	    	    		$upload_data_c="";
	    	    		$uplo = explode('.', $bildinfo['basename'] ); 
	     				$upload_data_rowc = mysql_query("SELECT datum FROM bilder WHERE id LIKE '$uplo[0]' ");
   	while($rowuplc = mysql_fetch_row($upload_data_rowc))
		$upload_data_c1 = explode('-', $rowuplc[0] ); 
		$upload_data_c = "$upload_data_c1[2].$upload_data_c1[1].$upload_data_c1[0]";  
		${'boxc'.$kc} =$ordner."/".$bild;
		echo '<div class="col-xs-4 thumb">
										<a href="'.$ordner.'/'.$bildinfo['basename'].'"data-lightbox="'. $ordner . '">
                    				<img class="img-responsive"  src="'.$ordner."/neu/".$bildinfo['basename'].'" alt="">
                				</a>
            				</div>
          					<div class="modal fade bs-example-modal-lg" id="c'.$kc.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  									<div class="modal-dialog" style="width: 900px;">
            						<div class="modal-content" >
											<div class="modal-header"><div style="margin-bottom:10px">
        									<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
											</div>
      								</div>
      								<img class="img-responsive" src="';  echo  $ordner."/".$bildinfo['basename'];   echo '" alt=""></div>
      							</div>
								</div>';

    }
 }            }        }   
	if($kc>3){} else {echo'
            <div class="col-xs-4 thumb">
                <a class="thumbnail" href="upload.php?n=1&datum='; echo $datum; echo '">
                    <img class="img-responsive" src="images/ph.png" alt="">
                </a>
            </div>';}?>
          </div>
          
<div id="bewertung">
		<?php 
      if(!isset($_COOKIE[$pfadc])) {  echo '
      <form method="post" action="?bew='; echo  $pfadc;echo "&datum="; echo $datum;echo '"><table cellspacing="1pt" cellpadding="1px">
         <tr> 
         <td>
         <select name="bew_c" class="select" style="height:17pt; width:26pt;">
         <option>-</option>
         <option>0</option>
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         </select></td>
         <td> /5 Sterne</td>
         <td><input style="height:17pt;" name=""'; echo " value='Essen bewerten'"; echo ' type="submit"></td>
         </tr>
         </table>
        </form> ';} else { echo "Essen wurde schon bewertet";}
		?>  
        
         </div>          
          
        </div>
        
        <div class="col-xs-10"  style="background-color:white;margin-top:30px;">
         <div id="show">
          <table width="100%"><tr><td  width="90px;"> Men&uuml; D</td><td width="140px;">
         <?php   if(isset($bewertgd) and $bewertgd >0) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertgd) and $bewertgd >1) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertgd) and $bewertgd >2) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>
         <?php   if(isset($bewertgd) and $bewertgd >3) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } ?>  
         <?php   if(isset($bewertgd) and $bewertgd >4) {echo '<img src="images/'.$image.'" width="20pt" height="20pt"  style="margin-bottom:5px" alt="" >'; }else {echo '<img src="images/'.$image_o.'" width="20pt" height="20pt" style="margin-bottom:5px" alt="" >'; } echo " ";?>
</td><td width="120px;"><font size="2"> (<?php    
				$anz_bew_outd=0;
          	$anz_bewd = mysql_query("SELECT anzahl FROM bewertung WHERE id LIKE '$pfadd'");
				while($row_anz_bewd = mysql_fetch_row($anz_bewd))
				$anz_bew_outd = $row_anz_bewd[0];           
				echo $anz_bew_outd;
				if ($anz_bew_outd!=1){echo" Bewertungen";} else {echo " Bewertung";}    ?>)  </font> </td><td align="right">  <?php echo $pfad4;?>  </td></tr></table>  
         </div> 
         			<div id="picture">
			<?php
		$ordner = "pictures/".$pfadd; 
		if ($ordner !=""){
								if(is_dir($ordner)) {
															$allebilder = scandir($ordner); 
															$kd=0;
															foreach ($allebilder as $bild) { 
															$bildinfo = pathinfo($ordner."/".$bild); 

      if ($bild != "." && $bild != ".."  && $bild != "_notes" && $bildinfo['basename'] != "Thumbs.db") { 
 		$kd= $kd+1; 
	   if($kd > 3 or $bild=="neu") break;
	    	    		$upload_data_d="";
	    	    		$uplo = explode('.', $bildinfo['basename'] ); 
	     				$upload_data_rowd = mysql_query("SELECT datum FROM bilder WHERE id LIKE '$uplo[0]' ");
   	while($rowupld = mysql_fetch_row($upload_data_rowd))
		$upload_data_d1 = explode('-', $rowupld[0] ); 
		$upload_data_d = "$upload_data_d1[2].$upload_data_d1[1].$upload_data_d1[0]";  
		${'boxd'.$kd} =$ordner."/".$bild;
		echo '<div class="col-xs-4 thumb">
										<a href="'.$ordner.'/'.$bildinfo['basename'].'"data-lightbox="'. $ordner . '">
                    				<img class="img-responsive" src="'.$ordner."/neu/".$bildinfo['basename'].'" alt="">
                				</a>
            				</div>
          					<div class="modal fade bs-example-modal-lg" id="d'.$kd.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  									<div class="modal-dialog" style="width: 900px;">
            						<div class="modal-content" >
											<div class="modal-header"><div style="margin-bottom:10px">
        									<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
											</div>
      								</div>
      								<img class="img-responsive"  src="';  echo  $ordner."/".$bildinfo['basename'];   echo '" alt=""></div>
      							</div>
								</div>';

    																																	}
 																										}            
 														}        
 								}   
		if($kd>3){} else {echo'
            <div class="col-xs-4 thumb">
                <a class="thumbnail" href="upload.php?n=1&datum='; echo $datum; echo '">
                    <img class="img-responsive" src="images/ph.png" alt="">
                </a>
            </div>';}?>
          </div>
<div id="bewertung">
		<?php 
      if(!isset($_COOKIE[$pfadd])) {  echo '
      <form method="post" action="?bew='; echo  $pfadd;echo "&datum="; echo $datum;echo '"><table cellspacing="1pt" cellpadding="1px">
         <tr> 
         <td>
         <select name="bew_d" class="select" style="height:17pt; width:26pt;">
         <option>-</option>
         <option>0</option>
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
         <option>5</option>
         </select></td>
         <td> /5 Sterne</td>
         <td><input style="height:17pt;" name=""'; echo " value='Essen bewerten'"; echo ' type="submit"></td>
         </tr>
         </table>
        </form> ';} else { echo "Essen wurde schon bewertet";}
		?>  
        
         </div>          
          
        </div>
        
        
        </div>
        </div>
            <!-- Site footer -->
     <footer class="footer" style="background-color:#222; margin-bottom:0px; min-width:800px;padding-top:2px; padding-bottom:2px;padding-left:40px;padding-right:40px;width:100%; bottom: 0; ">
       <p style="color:white;">        Version  <?php include 'includes/version.php';?>  - erstellt mit Bluefish und Bootstrap - umgesetzt von Dominik Eichler und Alwin Ebermann</p>
              <p class="text-muted"> <a  href="https://ldkf.de//de/impressum.html" target="_blank">Impressum</a> - <a target="_blank" href="https://ldkf.de//de/datenschutzerklaerung.html" >Datenschutz</a> - <a href="Information.php" target="_blank">&Uuml;ber diese Seite</a>      </p>  
</footer>
      <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
      <script type="text/javascript" src="js/lightbox.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
     <!-- /container -->
    
  </body>
</html>
