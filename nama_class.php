<?php
	//membuat kelas koneksi
	class Koneksi
	{
		//membuat variabel koneksi
		protected $con;

		//membuat function guna mengkoneksi dari localhost dengan nama database nama, username root, dan tanpa password
		public function __construct()
		{
			$this->con = new mysqli("localhost", "root", "", "test_webprog");
		}
	}

	//membuat kelas jenis nama yang merupakan anak dari kelas koneksi
	class Nama extends Koneksi
	{
		//memanggil function construct dari induknya
		public function __construct()
		{
			parent::__construct();
		}

		//membuat function untuk menambahkan data nama
		public function insertNama($nama1, $nama2, $nama3)
		{
			//membaca perintah SQL dan menghubungkan ke web untuk menambahkan nama baru
			$sql = "INSERT INTO nama_tabel (nama1, nama2, nama3) VALUES(?, ?, ?)";
			$stmt = $this->con->prepare($sql);

			$stmt->bind_param("sss",$nama1, $nama2, $nama3);
			$stmt->execute();

			if ($stmt->error) {
				return "Data Gagal Ditambahkan";
			}
			else
			{
                header('Location: nama.php');
                exit; 
			}
		}

		//membuat function untuk menampilkan data nama
		public function displayNama()
		{
			$sql = "SELECT * FROM nama_tabel";
			$result = $this->con->query($sql);

			return $result;
		}
	}
?>