<?php
require('..\global.php');
$date1 = $_POST['periode'];
$date2 = $_POST['periode2'];
$d1 = strtotime($date1);
$d2 = strtotime($date2);
$req = $db->connection()->prepare("SELECT * FROM reservation");
$req->execute();
$data = $req->fetchAll();
$rw = $req->rowCount();
$a = 0;
$b = 0;
$c = 0;
$prixTotal = 0;
for($i = 0; $i<$rw; $i++){
    $d = $data[$i]['periode'];
    $p = strtotime($d);
    if($data[$i]['libelleTarification'] == 'Ticket Enfant' && $p > $d1 && $p < $d2){
        $a++;
    }
    if($data[$i]['libelleTarification'] == 'Ticket adulte' && $p > $d1 && $p < $d2){
        $b++;
    }
    if($data[$i]['libelleTarification'] == 'Ticket Junior' && $p > $d1 && $p < $d2){
        $c++;
    }
    if($p > $d1 && $p < $d2){
        $prixTotal += $data[$i]['prix'];
    }
}
$total = $a + $b + $c;
header('Location: dashboard.php?a='.$a.'&b='.$b.'&c='.$c.'&t='.$total.'&d1='.$date1.'&d2='.$date2.'&pt='.$prixTotal);
