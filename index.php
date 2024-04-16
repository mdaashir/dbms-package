<!DOCTYPE html>
<html>
	<body>
		<?php
			echo "My first PHP script!";
			$db_handle = pg_connect("host=localhost dbname=linux user=linux password=linux");
			if ($db_handle) {
				echo '<br>Connection attempt succeeded.';
				} else {
				echo '<br>Connection attempt failed.';
				}
			echo "<h3>Connection Information</h3>";
			echo "DATABASE NAME:" . pg_dbname($db_handle) . "<br>";
			echo "HOSTNAME: " . pg_host($db_handle) . "<br>";
			echo "PORT: " . pg_port($db_handle) . "<br>";
			echo "<h3>Checking the query status</h3>";
			$query = "SELECT id,name FROM sample";
			$result = pg_exec($db_handle, $query);
			if ($result) {
				echo "The query executed successfully.<br>";
				echo "<h3>Print Id and Name:</h3>";
				for ($row = 0; $row < pg_numrows($result); $row++) {
					$id = pg_result($result, $row, 'id');
					echo $id ." ";
					$name = pg_result($result, $row, 'name');
					echo $name ."<br>";
					}

				} else {
					echo "The query failed with the following error:<br>";
					echo pg_errormessage($db_handle);
				}
			pg_close($db_handle);
		?>
	</body>
</html>
