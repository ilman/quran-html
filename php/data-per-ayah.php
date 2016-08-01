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


$sql = "SELECT id, quran_id, surah_id, ayah_id, ayah_number, ayah 
		FROM ayahs
		ORDER BY ayah_id ASC 
		LIMIT 9";
$result = $conn->query($sql);

$conn->close();
?>

<style>
	*{ border-sizing:border-box; }
	table{ width:100%; }
	th,td{ border:#ddd solid 1px; padding:5px; text-align:center; }
	th{ font-weight:bold; background:#ccc; }
	tr.even td{ background:#eee; }
	td input[type=text], td textarea{ display:block; width:100%; padding:5px; }
	/*td.word{ font-size:1.5em; }*/
	textarea.word{ font-size:1.8em; }
</style>

<table>
	<thead>
		<tr>
			<th>ayah_id</th>
			<th>surah_id</th>
			<th>ayah_number</th>
			<th>ayah</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; $y=0; while($row = $result->fetch_assoc()): ?>
			<?php if($i%3 === 1 ): $y++; ?>
				<tr class="<?php echo ($y%2 === 0) ? 'even' : 'odd' ?>">
					<td width="50" rowspan="3"><?php echo $row['ayah_id'] ?></td>
					<td width="50" rowspan="3"><?php echo $row['surah_id'] ?></td>
					<td width="50" rowspan="3"><a title="<?php echo 'ayah_id:'.$row['ayah_id'] ?>"><?php echo $row['ayah_number'] ?></a></td>
					<td class="word"><textarea class="word" data-id="<?php echo $row['id'] ?>"><?php echo $row['ayah'] ?></textarea></td>
				</tr>
			<?php else: ?>
				<tr>
					<td class="word"><textarea data-id="<?php echo $row['id'] ?>"><?php echo $row['ayah'] ?></textarea></td>
				</tr>
			<?php endif; ?>
		<?php $i++; endwhile; ?>
	</tbody>
</table>
