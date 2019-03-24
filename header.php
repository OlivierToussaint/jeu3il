<?php
function loadClass($classname)
{
    require 'class//'.$classname.'.php';
}

spl_autoload_register('loadClass');

$base = new PDO('mysql:host=localhost;dbname=tp', 'tp', 'secret');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

?>