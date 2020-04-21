<?php
include "DanceFloor.php";

$danceFloor=new DanceFloor();
$danceFloor->addDancer("Tom",true);
$danceFloor->addDancer("John",true);
$danceFloor->addDancer("David",true);
$danceFloor->addDancer("Mike",true);

$danceFloor->addDancer("Rachel",false);
$danceFloor->addDancer("Monica",false);
$danceFloor->addDancer("Phoebe",false);
echo ($danceFloor->pairUp());
$danceFloor->addDancer("Marry",false);
$danceFloor->addDancer("Rose",false);
$danceFloor->addDancer("Jane",false);
echo ($danceFloor->pairUp());



