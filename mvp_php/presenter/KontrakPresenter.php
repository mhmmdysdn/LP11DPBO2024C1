<?php


interface KontrakPresenter
{
	public function prosesDataPasien();
	public function tambahPasien($data);
	public function hapusPasien($id);
	public function ubahPasien($data);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getSize();
}
