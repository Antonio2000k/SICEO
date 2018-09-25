<?php
// Array with names


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    //$fecha = "20-12-2001";

    $anno = date('Y', strtotime($q));

    if ($anno >=1948 && $anno <=2013){
        echo "Está dentro del periodo";
    }else{
        echo "Error la fecha ingresada está fuera del periodo valido";
    }
    
}

// Output "no suggestion" if no hint was found or output correct values 

?>