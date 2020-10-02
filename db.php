<?php

$username='maria';
$password='maria';
$connection_string='localhost/XE';
$con=oci_connect($username,$password,$connection_string);

// Check connection
if (!$con) {
    echo('conn failed');
}


?>

