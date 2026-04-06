<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 

		//Mengambil kelas nama
		require_once('nama_class.php');
		$displayNama = new Nama();
		$hasil = $displayNama->displayNama();

		//Form menambahkan data nama
		echo "<form method='POST' action='nama.php'>";
			echo "Nama1: <input type='text' name='nama1'> <br><br>";
			echo "Nama2: <input type='text' name='nama2'> <br><br>";
			echo "Nama3: <input type='text' name='nama3'> <br><br>";
			echo "<input type='submit' name='submit' value='Simpan'> <br><br>";
			echo "<button><a href='index.php'>Kembali</a></button>";
		echo "</form>";	

		//Tabel menampilkan data nama
		echo "<table border='1'>";
			echo "<tr>";
				echo "<th>Nama1</th>";
				echo "<th>Nama2</th>";
				echo "<th>Nama3</th>";
			echo "</tr>";
			while ($row = $hasil -> fetch_assoc()) 
			{
				echo "<tr>";
					echo "<td>".$row['nama1']."</td>";
					echo "<td>".$row['nama2']."</td>";
					echo "<td>".$row['nama3']."</td>";
				echo "</tr>";
				echo "<br>";
			}
		echo "</table>";

		//Proses penambahan data nama
		if (isset($_POST['submit'])){
			$nama1 = $_POST['nama1'];
			$nama2 = $_POST['nama2'];
			$nama3 = $_POST['nama3'];
			$proses = new Nama();
			$hasil = $proses->insertNama($nama1, $nama2, $nama3);
			echo $hasil;
		}
	?>
</body>
</html>
