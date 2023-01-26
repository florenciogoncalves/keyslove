<?php
require __DIR__ . "/home/app/Models/Model.php";
$Model = new Model();

echo "<pre>";

var_dump($Model->aroundPeople());
