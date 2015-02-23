<?php
/*
if( isset ($_GET['d'])) {
$d="";
$d=  $_GET['d'];
if($d=="dominikisttoll"){
	
	echo '<br><br><div id="intern">';
echo'<form method="post" action="" >
       <input name="pw2" value ="PW-Plan"  onfocus="resetb(pw2)"  autocomplete="off"  class="planup" type="password"><br>
      <input value="Plan aktualisieren" type="submit"><br>
    </form>
<form method="post" action="">
       <input class="filermname" value="Pfad" onfocus="resetd(del)" autocomplete="off" name="del" type="text"><br>
              <input class="filerm" onfocus="reseta(pw3)" autocomplete="off"  value="PW-Plan" name="pw3" type="password"><br>
      <input value="Falsche Datei entfernen" type="submit"><br>
    </form>
    '; } 
   if(isset($_POST['del'])) {  $filename="pictures/".$_POST['del']; unlink($filename);}  
    
$verbindung = mysql_connect("localhost", "msn" , "llkOrOoDzibSiXBdkRdc") or die("Verbindung zur Datenbank konnte nicht hergestellt werden"); 
	mysql_select_db("msn") or die ("Datenbank konnte nicht ausgewählt werden"); 


$pwcheck="";
 if ( isset($_POST['pw2'] )) 
  {
$pwcheck = $_POST['pw2'] ;
  } 
if($pwcheck=="6-12-26Derdome;") {  
*/
 
echo exec("python scripts/getplan.py");




/*
$eingabe = htmlspecialchars($section);
$eingabe =  str_replace("€", "",$eingabe); 
$eingabe =  str_replace("/table", "",$eingabe); 
$eingabe =  str_replace("ä", "ae",$eingabe); 
//$eingabe =  str_replace(" ", "",$eingabe); 
$eingabe =  str_replace("ö", "oe",$eingabe); 
$eingabe =  str_replace("ü", "ue",$eingabe); 
$eingabe =  str_replace("ß", "ss",$eingabe); 
$eingabe =  str_replace("/td", "",$eingabe); 
$eingabe =  str_replace("&gt;", "",$eingabe);  //>
$eingabe =  str_replace("&lt;", "",$eingabe);  //<
$eingabe =  str_replace("'row1'td id='zeile'b/btd", "",$eingabe); 
$eingabe =  str_replace("'row0'td id='zeile'b/btd", "",$eingabe); 
$ausgabe = explode("tr id=",$eingabe);
$erg=count ($ausgabe);

$n=0;
$l=0;
$m=1;
while($n<$erg-1) { $n++;
if($l < 4 ){$l++;}else {$l = 1; $m++; } 

if($l==1){$bezeichnung="a";}
else {if($l==2){$bezeichnung="b";} else {
if($l==3){$bezeichnung="c";}else {
if($l==4){$bezeichnung="d";}else {
}}}}	
	
	$a=$ausgabe[$n];
	$b = explode("td",$a);


echo "<br>";

 $tag = $b[0];
 $datum_aus ="";
$datum_aus = $b[1]; 
$date_new = explode('.',$datum_aus);
$datum_aus1= "$date_new[2]-$date_new[1]-$date_new[0]";
$essen_aus = trim($b[2]);
$preis = $b[3];
  echo $essen_aus;
$resultessenein = mysql_query("SELECT name FROM essen WHERE name LIKE '$essen_aus' "); 
while($rowessenein = mysql_fetch_row($resultessenein))
$essenein = $rowessenein[0];
echo $essenein;
if(empty($essenein)) {
$eintrag5 = "INSERT INTO essen (name) VALUES ('$essen_aus')"; 
    $eintragen5 = mysql_query($eintrag5); 

    } 
$essenein="";
$resultid = mysql_query("SELECT id FROM essen WHERE name LIKE '$essen_aus' "); 
 while($rowid = mysql_fetch_row($resultid))
		$id_eintr = $rowid[0]; 
		echo $id_eintr;
   $eintrag = "INSERT INTO datum (id, datum, tag, bez, preis) VALUES ('$id_eintr','$datum_aus1','$tag','$bezeichnung','$preis' )"; 
    $eintragen = mysql_query($eintrag); 
    if($eintragen == true) 
        { 
        $datum_aus1="";
        } 
 else 
        { 
        $datum_aus1="";
        }      
}
    
    
    
    
    
  echo"</div>" ; 
    
    
    } } */ ?>        