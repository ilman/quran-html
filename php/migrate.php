<?php 

$string = file_get_contents('../data/quran-wordbyword.json');
$json = json_decode($string, true);
// $ayah = $json['quran-kids'][1];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quran";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


foreach ($json['quran-kids'] as $ayah) {
	$verse = trim($ayah['verse'], '$');
	$words = explode('$', $verse);

	$quran_id = 1;

	$data = array(
		'quran_id' => $quran_id,
		'surah_id' =>  $ayah['surah'],
		'ayah_id' =>  $ayah['id'],
		'ayah_number' =>  $ayah['ayah'],
	);

	foreach ($words as $word) {
		$word_parts = explode('|', $word);

		$data['word'] = $word_parts[0];
		$data['word_number'] = $word_parts[4];
		$data['num1'] = $word_parts[2];
		$data['num2'] = $word_parts[3];

		$sql = "INSERT INTO words (quran_id, surah_id, ayah_id, ayah_number, word, word_number, num1, num2) 
			VALUES (".$quran_id.", '".$data['surah_id']."', '".$data['ayah_id']."', '".$data['ayah_number']."', '".$data['word']."', '".$data['word_number']."', '".$data['num1']."', '".$data['num2']."')";

		if ($conn->query($sql) == TRUE) {
			echo $quran_id.", '".$data['surah_id']."', '".$data['ayah_id']."', '".$data['ayah_number']."', '".$data['word_number']."' added";
			echo "\n";
		} else {
			echo "Error: " . $sql . "\n" . $conn->error;
			echo "\n";
		}
	}

}


$conn->close();

echo "\n done";