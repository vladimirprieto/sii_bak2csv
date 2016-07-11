<?php

//sacamos la ruta
$array_tmp = explode('/',$xml_archivo);
//sacamos la extension
$array_tmp = explode('.',$array_tmp[sizeof($array_tmp)-1]);
$nombre_archivo = $array_tmp[0];

header("Content-Description: File Transfer");
header('Content-Type: application/force-download; charset=utf-8');
header("Content-Disposition: attachment; filename=".$_GET['listado']."_".$nombre_archivo.".csv");

$salida = "";
foreach ($docs as $row) {
   foreach ($row as $column) {
      $salida .="\"".addslashes($column)."\";";
   }
   $salida .= "\n";
}
echo $salida;




