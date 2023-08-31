<?php

$divider = '<br><hr><br>';

require_once("./interface/Printable.php");
require_once("Furniture.php");
require_once("Sofa.php");
require_once("Bench.php");
require_once("Chair.php");



//Part 1
echo $divider . "Part 1" . $divider;

$furniture1 = new Furniture(60, 200, 160);
$furniture1->setIsForSeating(1);
$furniture1->setIsForSleeping(1);
// echo $furniture1->area();
// echo $furniture1->volume();
$furniture1->printIt();

echo "<br />";

//Part 2
echo $divider . "Part 2" . $divider;

$sofa1 = new Sofa(90, 220, 60);
$sofa1->setIsForSleeping(false);
$sofa1->setArmrests(2);
$sofa1->setSeats(3);
echo "Area is: " . $sofa1->area() . " cm2";
echo "<br />";
echo "Volume is: " . $sofa1->volume() . " cm3";
echo "<br />";
echo $sofa1->area_opened();
echo "<br />";
echo "<br />";
$sofa1->setIsForSleeping(true);
$sofa1->setLengthOpened(150);
echo "Area when opened is: " . $sofa1->area_opened();
echo "<br />";

//Part 3
echo $divider . "Part 3" . $divider;

$bench = new Bench(80, 200, 40);
$bench->setIsForSleeping(true);
$bench->print();
echo "<br>";
$bench->sneakpeek();
echo "<br>";
$bench->fullinfo();
echo "<br>";
echo "<br>";
$chair = new Chair(45, 45, 80);
$chair->setIsForSleeping(false);
$chair->setIsForSeating(true);
$chair->print();
echo "<br>";
$chair->sneakpeek();
echo "<br>";
$chair->fullinfo();
echo "<hr>";
