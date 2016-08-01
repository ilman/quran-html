<?php 


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

function insert_ayah($conn, $string, $key, $quran_id){

	$json = json_decode($string, true);

	foreach ($json[$key] as $ayah) {
		$verse = trim($ayah['verse'], '$');
		$words = explode('$', $verse);

		$data = array(
			'quran_id' => $quran_id,
			'surah_id' => $ayah['surah'],
			'ayah_id' => $ayah['id'],
			'ayah_number' => $ayah['ayah'],
			'ayah' => $conn->real_escape_string($verse),
		);

		$sql = "INSERT INTO ayahs (quran_id, surah_id, ayah_id, ayah_number, ayah) 
				VALUES (".$quran_id.", '".$data['surah_id']."', '".$data['ayah_id']."', '".$data['ayah_number']."', '".$data['ayah']."')";

		if ($conn->query($sql) == TRUE) {
			// echo '<pre style="background:#eee; border:#ddd solid 1px; color:#999; padding:10px; margin:10px 0; display:block; clear:both;">';
			echo $quran_id.", '".$data['surah_id']."', '".$data['ayah_id']."', '".$data['ayah_number']."' added";
			// echo '</pre>';
			echo "\n";
		} else {
			echo "Error: " . $sql . "\n" . $conn->error;
			echo "\n";
		}

	}
}

/*---quran usmani---*/ 


$string = file_get_contents('../data/quran-uthmani.json');
insert_ayah($conn, $string, 'quran-uthmani', 1);


/*---quran transliterate---*/

$string = file_get_contents('../data/id.transliteration.json');
insert_ayah($conn, $string, 'id.transliteration', 2);


/*---quran indonesia---*/

$string = file_get_contents('../data/id.indonesian.json');
insert_ayah($conn, $string, 'id.indonesian', 3);


$conn->close();

echo "\n done";