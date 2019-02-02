<?php
include 'logMeteo.php';
$typ = $_GET['nazwa'];
$b = $_GET['mian'];
$typ = $_REQUEST['nazwa'];

$polaczenie = new mysqli($host, $db_user, $db_pass, $db_name);

if($polaczenie->connect_errno!=0){
    die("Error: ".$polaczenie->connect_errno."Opis: ".$polaczenie->connect_error);
}
      $typ = $polaczenie->real_escape_string($typ);
      $sqlOdczyt="SELECT aktualna FROM meteo WHERE czujnik = '${typ}'";
      $odczyt=$polaczenie->query($sqlOdczyt);
      $row = $odczyt->fetch_row();
      $odczyt->close();
      
if ($row) {
	$result = $row[0];
     echo $result." ".$b;
    }
 else {
    echo "0 results";
}

?>