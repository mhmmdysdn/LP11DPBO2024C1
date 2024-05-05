<?php

interface KontrakView{
	public function tampil();
	public function tambahPasien($data);
	public function hapusPasien($id);
	public function ubahPasien($data);
}

?>