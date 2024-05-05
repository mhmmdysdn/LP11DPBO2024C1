<?php
class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienById($id)
	{
		// Query mysql select data pasien berdasarkan id
		$query = "SELECT * FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addPasien($pasien)
	{
		$nik = $pasien['nik'];
		$nama = $pasien['nama'];
		$tempat = $pasien['tempat'];
		$tl = $pasien['tl'];
		$gender = $pasien['gender'];
		$email = $pasien['email'];
		$telp = $pasien['telp'];

		// Query mysql insert data pasien
		$query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) VALUES ('$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function deletePasien($id)
	{
		// Query mysql delete data pasien
		$query = "delete from pasien where id = $id";

		// Mengeksekusi query
		return $this->execute($query);
	}

	function updatePasien($pasien)
	{
		$id = $pasien['id'];
		$nik = $pasien['nik'];
		$nama = $pasien['nama'];
		$tempat = $pasien['tempat'];
		$tl = $pasien['tl'];
		$gender = $pasien['gender'];
		$email = $pasien['email'];
		$telp = $pasien['telp'];

		// Query mysql update data pasien
		$query = "update pasien set nik = '$nik', nama = '$nama', tempat = '$tempat', tl = '$tl', gender = '$gender', email = '$email', telp = '$telp' where id = $id";

		// Mengeksekusi query
		return $this->execute($query);
	}	
}