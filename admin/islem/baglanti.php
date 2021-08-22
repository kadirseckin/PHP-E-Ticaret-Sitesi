<?php 

try {
	$baglanti=new PDO("mysql:host=localhost;dbname=eticaretdb",'root','');
} catch (Exception $e) {
	echo $e->getMessage();
}

 ?>