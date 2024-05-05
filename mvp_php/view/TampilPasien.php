<?php
include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView {
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct() {
        //konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tampil() {
        $this->prosespasien->prosesDataPasien();
        $data = null;

        //semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
                <td>" . $no . "</td>
                <td>" . $this->prosespasien->getNik($i) . "</td>
                <td>" . $this->prosespasien->getNama($i) . "</td>
                <td>" . $this->prosespasien->getTempat($i) . "</td>
                <td>" . $this->prosespasien->getTl($i) . "</td>
                <td>" . $this->prosespasien->getGender($i) . "</td>
                <td>" . $this->prosespasien->getEmail($i) . "</td>
                <td>" . $this->prosespasien->getTelp($i) . "</td>
                <td>
					<form method='POST' action='index.php'>
						<input type='hidden' name='id' value='" . $this->prosespasien->getId($i) . "'>
						<input type='submit' name='edit' value='Edit'>
					</form>
					<form method='POST' action='index.php' onsubmit='return confirmDelete()'>
						<input type='hidden' name='id' value='" . $this->prosespasien->getId($i) . "'>
						<input type='submit' name='hapus' value='Hapus' class='btn btn-danger'>
					</form>
                </td>
            </tr>";
        }

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Tambahkan kode berikut untuk menampilkan form edit
        if (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $i = array_search($id, array_column($this->prosespasien->getData(), 'id'));
			$data_form = "<div class='col-lg-4 col-md-4 col-sm-4 col-4 m-3'>
			<div class='card p-5 mr-3'>
				<h2 class='card-title'>Edit Pasien</h2>
				<form method='POST' action='index.php'>
					<div class='form-row'>
						<div class='form-group col'>
							<input type='hidden' name='id' value='" . $this->prosespasien->getId($i) . "'>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col'>
							<label>NIK</label>
							<input type='text' class='form-control' name='nik' value='" . $this->prosespasien->getNik($i) . "'>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col'>
							<label>Nama</label>
							<input type='text' class='form-control' name='nama' value='" . $this->prosespasien->getNama($i) . "'>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col'>
							<label>Tempat</label>
							<input type='text' class='form-control' name='tempat' value='" . $this->prosespasien->getTempat($i) . "'>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col'>
							<label>Tanggal Lahir</label>
							<input type='date' class='form-control' name='tl' value='" . $this->prosespasien->getTl($i) . "'>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col'>
							<label>Jenis Kelamin</label>
							<select class='form-control' name='gender'>
								<option value='Laki-Laki' " . ($this->prosespasien->getGender($i) == 'Laki-Laki' ? 'selected' : '') . ">Laki-laki</option>
								<option value='Perempuan' " . ($this->prosespasien->getGender($i) == 'Perempuan' ? 'selected' : '') . ">Perempuan</option>
							</select>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col'>
							<label>Email</label>
							<input type='email' class='form-control' name='email' value='" . $this->prosespasien->getEmail($i) . "'>
						</div>
					</div>
					<div class='form-row'>
						<div class='form-group col'>
							<label>No. Telp</label>
							<input type='text' class='form-control' name='telp' value='" . $this->prosespasien->getTelp($i) . "'>
						</div>
					</div>
					<button type='submit' name='update' class='btn btn-primary mt-3'>Update</button>
					<button type='submit' name='cancel' class='btn btn-danger mt-3'>Cancel</button>
				</form>
			</div>
		</div>";
            $this->tpl->replace("DATA_FORM", $data_form);
        } else {
            $this->tpl->replace("DATA_FORM", "");
        }

        // Mengganti kode DATA_TABEL dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);
		$this->tpl->replace("CONFIRM_DELETE_SCRIPT", "<script>
        function confirmDelete() {
            return confirm('Apakah anda yakin menghapus data ini?');
        }
    	</script>");

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function tambahPasien($data) {
        $this->prosespasien->tambahPasien($data);
    }

    function hapusPasien($id) {
        $this->prosespasien->hapusPasien($id);
    }

    function ubahPasien($data) {
        $this->prosespasien->ubahPasien($data);
    }
}