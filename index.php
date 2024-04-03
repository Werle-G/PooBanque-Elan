<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=E, initial-scale=1.0">
    <title>ExPoo1</title>
    
</head>
<body>

<?php
require 'titulaireCompte.php';
require 'compteBancaire.php';

$titulaire1 = new Titulaire ("Werle", "Guillaume", "09-06-1986", "Thann");
$titulaire2 = new Titulaire ("Martelo", "Jean", "06-08-2000", "Mulhouse");

$compte1 = new CompteBancaire ("Livret A", 300, "$", -300, $titulaire1);
$compte2 = new compteBancaire ("PEL", 1000, "€", -300, $titulaire2);
$compte3 = new compteBancaire ("Livret A", 500, "€", -500, $titulaire2);


$titulaire1->afficherInformations();
echo '<br>';
$titulaire2->afficherInformations();
echo '<br>';
$compte1->debiter(500);
echo '<br>';
$titulaire1->afficherInformations();
echo '<br>';
$titulaire2->afficherInformations();
echo '<br>';
$titulaire1->afficherInformations();
echo '<br>';
$compte2->virement($compte3, 15000);
?>
    
</body>
</html>