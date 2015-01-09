<?php
class animals {
    public $animal_type;
    public $animal_name;
    public $animal_id;
}


require 'database.php';

$pdo = Database::connect();

// $sth = $pdo->prepare("SELECT animal_type, animal_name, animal_id FROM animals");
//$sth = $pdo->prepare("SELECT * FROM animals where animal_id between 6 and 10");
$sth = $pdo->prepare("SELECT * FROM animals");
$sth->execute();

$result = $sth->fetchAll(PDO::FETCH_CLASS, "animals");
//var_dump($result);

$data =  json_encode($result);

$counter = count($result);
echo "counter = " . $counter . "<br>";

for ($i = 0; $i < $counter; $i++) 
{
	echo  json_encode($result[$i]);;
	echo "<br>";
}

//foreach ($result as $col) 
//{
//	foreach($col as $row)
//	{
//		echo $row;
//		echo " __ ";
//	}
//	echo "<br>";
//}

Database::disconnect();

?>