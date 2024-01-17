<?php
require __DIR__ . "/home/app/Models/Model.html";
$Model = new Model();

echo "<pre>";

var_dump($Model->aroundPeople());
