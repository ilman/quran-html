<?php 

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


$sql = "SELECT id as word_id, surah_id, ayah_id, ayah_number, word_number, word 
		FROM words 
		-- ORDER BY word_number, ayah_id ASC 
		LIMIT 3";
$result = $conn->query($sql);

$conn->close();
?>

<style>
	*{ border-sizing:border-box; }
	table{ width:100%; }
	th,td{ border:#ddd solid 1px; padding:5px; text-align:center; }
	th{ font-weight:bold; background:#ccc; }
	tr:nth-child(even) td{ background:#eee; }
	td input[type=text]{ display:block; width:100%; padding:5px; }
	td.word{ font-size:1.5em; }
</style>

<table>
	<thead>
		<tr>
			<th>word_id</th>
			<th>surah_id</th>
			<th>ayah_number</th>
			<th>word_number</th>
			<th>word</th>
			<th>transliterate</th>
			<th>translate</th>
		</tr>
	</thead>
	<tbody>
		<?php while($row = $result->fetch_assoc()): ?>
			<tr>
				<td width="50"><?php echo $row['word_id'] ?></td>
				<td width="50"><?php echo $row['surah_id'] ?></td>
				<td width="50"><a title="<?php echo 'ayah_id:'.$row['ayah_id'] ?>"><?php echo $row['ayah_number'] ?></a></td>
				<td width="50"><?php echo $row['word_number'] ?></td>
				<td class="word"><?php echo $row['word'] ?></td>
				<td><input type="text" /></td>
				<td><input type="text" /></td>
			</tr>
		<?php endwhile; ?>
	</tbody>
</table>
