<?php
include("includes/db_connect.php");
#Define constants
session_start();
$anz=0;
$anzahl=0;
$woche=0;
if(isset($_SESSION['bestellung']) and $_SESSION['bestellung']==1) {
    $bestellt=1;
    unset($_SESSION['bestellung']);
}

if(isset($_GET['l']) and $_GET['l']==1  ) {
    $session_b=$_SESSION['id'];
    exec("python scripts/logout.py $session_b");
    session_destroy();
    $login=0;	
    header('Location: ./');
} 

if(isset($_POST['wkorb']) and $_POST['wkorb']==1) {
    $d=1;
    $j=0;
    $ssid=$_SESSION['id'];
    while($d<21) {
        $var=$_POST[$d];
        $anz=$_POST[$d.'_anz'];
        $v_explode = explode('_',$var);

        $id_e=$v_explode[0];
        $dat_e=$v_explode[1]; 
        $anzahl=$v_explode[2]; 
        if($anzahl=="") {$anzahl=0;}  
        if($anz=="") {
            $anz=0;
        }  
        //auslesen
        if($anz!=$anzahl) {
            exec("python scripts/selectmenu.py $ssid $dat_e $id_e $anz", $out);
            $outa[$j]=json_decode($out[0]);
            $j++;
        }
        $anzahl=0;
        $anz=0;
        $d++;
    }
    if(isset($outa[0])) {
        exec("python scripts/checkout.py $ssid", $osut);
        $_SESSION['bestellung'] = 1;
    }
    header('Location: intern.php');
} 

$login=0;
if(isset($_SESSION['kdnrv']) and isset($_SESSION['geheim']) and $_SESSION['geheim']!="" and $_SESSION['kdnrv']!="" )
{
    if(isset($_GET['week']) and $_GET['week']>-1 ){
        $woche=$_GET['week'];
    }
    $usr=$_SESSION['kdnrv'];
    $pw=$_SESSION['geheim'];
    exec("python scripts/login.py $usr $pw", $stdout);
    $session_a=json_decode($stdout[0]);
    $session=$session_a[0];
    $_SESSION['id']=$session;
        if($stdout[0]==0 and !isset( $_SESSION['id']))  {header('Location: ./'); $_SESSION['fail']=1;}
    $login=1;

	if($session!="") 
   {
		exec("python scripts/getmenu.py $session $woche", $getmen);
		if($woche<3 and $getmen[0]==1) 
			{
			$woche++;
			header('Location: intern.php?week='.$woche);
			}
		
		if($woche==3 and $getmen[0]==1) 
			{
			header('Location: intern.php?week=0');
			}
		
		if($getmen[0]!=1 ) 
			{
			$getm=json_decode($getmen[0]); 
			}
		else 
			{
			//header('Location: intern.php?week=0');
			}
		unset($_SESSION['fail']);
   }
}
else 
	{
	header('Location: ./');
	}  

 ?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" >    
    <title>msn.ldkf.de - Bestellseite</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
  </head>
<!--  Das hier wird nicht angezeigt-->
<div class="modal fade odrsuccess" aria-hidden="true" aria-labelledby="mySmallModalLabel" role="dialog" tabindex="-1" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body"> Bestellung &uuml;bermittelt. </div>
        </div>
    </div>
</div>
<!--hier geht's wieder los-->
  <body>
    
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://ldkf.de">LDKF.de</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar" style="vertical-align:middle;">
                    <ul class="nav navbar-nav" >
                        <li><a href="./">Startseite</a></li>
                        <li><a href="upload.php">Uploader</a></li>
                        <li class="active"><a href="intern.php">Bestellseite</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        
                        <form class="navbar-form form-inline" id="order" action="/intern.php" method="post">
                        <button type="submit" id="nonejs_button" class="btn btn-primary">Bestellung &uuml;bermitteln</button><input type="hidden" value="1" name="wkorb"/>
                        <a href="/intern.php?l=1" class="btn btn-primary " style="margin-left:20px;">Ausloggen</a>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    <div class="container" id="main">
	    <div class="jumbotron heading">
	      <?php
if (isset($bestellt) and $bestellt == 1 ) {
    echo '<h1>Willkommen auf der Bestellseite</h1><p class="lead">Deine Bestellung war erfolgreich.</p>';
}     
else {   
    echo '<h1>Willkommen auf der Bestellseite</h1>
      	<p class="lead">Hier kannst du dein Essen f&uuml;r die jeweilige Woche bestellen.<br>
       	Die Bestellung wird direkt an die Website des Men&uuml;service-Neuburg &uuml;bermittelt.<br>
       	Du kannst auch weiterhin auf der <a href="http://menue-service-neuburg.de/ " target="_blank">Seite des Essenanbieters</a> bestellen.</p><a id="row">' ; 
}
?>
         
            

           
            
<?php  
$image_o="grau.svg";
$image="gelb.svg";
$c=0;
echo $getm[0][0];
if(!isset($getm)) {
	//so hier beginnt der spaß
//	$getm[0]
	
	}
	$wochep=$woche+1;
	$wochem=$woche-1;
	echo '   </div>       
        <div class="container" id="all">
            <div id="weeknav">
                <a class="btn btn-primary btn-lg active" href="intern.php?week='.$wochem.'#row"><<</a>
                <a class="btn btn-default btn-lg active" href="intern.php?week=0#row">Aktuelle Woche / N&auml;chste Schulwoche</a>
                <a class="btn btn-primary btn-lg active" href="intern.php?week='.$wochep.'#row"> >> </a>
            </div>
            <div id="meals">';
	
foreach ($getm as $info) {
    $meal= array("date"=>$info[0], "weekday"=>$info[1], "counter"=>$info[2], "meal"=>  htmlentities($info[3]), "betrag"=>$info[4], "mealnumber"=>$info[5], "anz"=>$info[6]);
    $datum_bestell=$info[0];
    $tag_bestell=$info[1];
    $nr=$info[2];
    $name=$info[3];
    $preis=$info[4];
    $id=$info[5]; 
    $anzahl=$info[6];
    $c++;
    $bewertga=0;		 									
    $bewertgb=0;
    $bewertgc=0;		 	 			
    $bewertgd=0;
    $bew=[];
    $pic=[];
    if($nr==0) {
        $value_date=date("d.m.Y", strtotime($datum_bestell));
        echo '<div class="row"><div class="date">'.$tag_bestell.", der ".$value_date.'</div></div><div class="row day">';
    }    
    $letters=["a", "b", "c", "d"];
    $pfad=[];
    foreach($letters as $letter) {
        //Hier wird das Bild gesucht
        $query="SELECT id FROM datum WHERE datum LIKE '$datum_bestell' and bez LIKE '".$letter."' ";
        $result=mysql_query($query);
        $pic[]="";
        while($row=mysql_fetch_array($result)) {
            $ordner="pictures/".$row[0];
            if ($row[0]!="" && is_dir($ordner)){
                $bilderlist=scandir($ordner);
                foreach($bilderlist as $bild) {
                    if ($bild != "." && $bild != ".."  && $bild != "_notes" && pathinfo($ordner."/neu/".$bild)['basename'] != "Thumbs.db" && $bild!="neu") { 
                        array_pop($pic);
                        $pic[]=$ordner."/neu/".$bild;
                        break;
                    }
                }
            }
        }
    }
    $query="SELECT id FROM datum WHERE datum LIKE '$datum_bestell' and bez LIKE '".$letters[$nr]."' ";
    $result=mysql_query($query);
    $rating_id=mysql_fetch_array($result)[0];
    $menues=["Men&uuml; A", "Men&uuml; B", "Men&uuml; C", "Men&uuml; D"];
    $menu=$menues[$nr];
    
    echo '<div class="col-md-3 col-xs-12 col-sm-6" style=""><div class="meal';
    if($anzahl>0) {
        echo ' tdborder';
    }
    echo '"><span style="font-weight:bold">'.$menu."</span>"; 
    if($preis!=0) {
        echo " (";
        echo strtr($preis, ".", ",");
        echo"&euro;) ";

    }
    echo ' Anzahl: <input class="form-control anz-form input-sm number" autocomplete="off"  type="text" maxlength="1" pattern="\d*" name="'.$c.'_anz'.'" placeholder="0" value="';
    if($anzahl!=0) { 
        echo $anzahl;
    } 
    echo '"';  	
    if($preis==0) {
        echo " disabled"; 
    } 
    echo '><input type="hidden" name="'. $c.'" value="'. $id. "_". $datum_bestell. "_". $anzahl. '"/><br>'.  htmlentities($name)."<br>"; 
    echo 'Bewertung: ';
    //hier werden die Bewertungen ausgegeben
    $result=0;
    $result_bew = mysql_query("SELECT bew FROM bewertung WHERE id LIKE '$rating_id'");
while($row_bew = mysql_fetch_row($result_bew))
if(isset($row_bew[0])) 
	{
	$result=round($row_bew[0]);						
	}    
    
    $counter=0; 
    while($counter<$result) {
       echo '<img src="images/gelb.svg" class="star" alt="" />';
       $counter++;
    }
    while($counter<5) {
       echo '<img src="images/grau.svg" class="star" alt="" />';
       $counter++;
    }	
    //hier die Bilder angezeigt, wenn sie verfügbar sind
    
    echo '<div id="'.$c.'_div" style="width:180px; padding:6;">';
    if($pic[$nr] !="") {
        echo '<a href="'.  str_replace('/neu', '', $pic[$nr]) .'" data-lightbox="'. $datum_bestell . '" data-title="' . $menu . ': ' . $meal["meal"] . '"><img class="mealimg" src="'.$pic[$nr].'" alt=""></a>';
    }
    echo'</div></div>';
    
    echo '</div>';	
    if($nr==3) {
        echo '</div>';
    } 
}

?>    
        
                

         
   </div>
</div>
    </div> 
<footer class="footer" style="background-color:#222; margin-bottom:0px; min-width:800px;padding-top:2px; padding-bottom:2px;padding-left:40px;padding-right:40px;width:100%; bottom: 0; ">
       <p style="color:white;">Version <?php include 'includes/version.php';?>  - erstellt mit Bluefish und Bootstrap - umgesetzt von Dominik Eichler und Alwin Ebermann</p>
              <p class="text-muted"> <a  href="https://ldkf.de//de/impressum.html" target="_blank">Impressum</a> - <a target="_blank" href="https://ldkf.de//de/datenschutzerklaerung.html" >Datenschutz</a> - <a href="Information.php" target="_blank">&Uuml;ber diese Seite</a>      </p>  
</footer>
      <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
      <script type="text/javascript" src="js/lightbox.min.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
     <!-- /container -->  
  </body>
</html>