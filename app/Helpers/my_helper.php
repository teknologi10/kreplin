<?php

/**
 * Author           : Alfikri
 * Created By       : Alfikri
 * E-Mail Primary   : alfikri.name@gmail.com
 * E-Mail Secondary : klinik.code@gmail.com
 * Blog             :  
 */

// Class rajaongkir
class rajaongkir
{

	private $key      = 'c3ccc1a385546a5b9af89abe5bda89eb'; // API Key dari rajaongkir
	private $city_url = 'https://api.rajaongkir.com/starter/city'; // Url untuk mengambil data kota
	private $cost_url = 'https://api.rajaongkir.com/starter/cost'; // Url untuk mengambil biaya ongkir

	// Untuk sorting array
	function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
	{
		$sort_col = array();
		foreach ($arr as $key => $row) {
			$sort_col[$key] = $row[$col];
		}

		array_multisort($sort_col, $dir, $arr);
	}

	// Untuk mengambil data kota
	function get_city()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $city_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: {$key}"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}

	// Untuk mengambil data biaya ongkir berdasarkan kota asal, kota tujuan, berat dan kurir
	function get_cost($id_kota_asal, $id_kota_tujuan, $berat, $courir)
	{

		$key      = 'c3ccc1a385546a5b9af89abe5bda89eb'; // API Key dari rajaongkir
		$city_url = 'https://api.rajaongkir.com/starter/city'; // Url untuk mengambil data kota
		$cost_url = 'https://api.rajaongkir.com/starter/cost'; // Url untuk mengambil biaya ongkir


		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $cost_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=" . $id_kota_asal . "&destination=" . $id_kota_tujuan . "&weight=" . $berat . "&courier=" . $courir,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: {$key}"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}
}



function nf($angka)
{
	return number_format($angka, 0, ",", ".");
}

function rupiah($angka)
{
	$fmt = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
	$formatAngka = $fmt->formatCurrency($angka, "IDR");

	return $formatAngka;
}

function jml_produk($id_toko)
{
	$db = \Config\Database::connect();

	$output = $db->table('katalog')
		->selectCount('id_penjual', 'total')
		->where('id_penjual', $id_toko)
		->get()->getRowArray();

	$jml = count($output);

	return $jml;
}

//format tanggal format aslinya return $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu." WIB";
date_default_timezone_set("Asia/Jakarta");


function tglwaktu_lengkap($date)
{
	$Bulan = array(
		"Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September",
		"Oktober", "November", "Dessember"
	);
	$Hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
	$tahun = substr($date, 2, 2);
	$bulan = substr($date, 5, 2);
	$tgl = substr($date, 8, 2);
	$waktu = substr($date, 11, 5);
	$hari = date("w", strtotime($date));
	return $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . "<br>" . $waktu;
}

function tgl_lengkap($date)
{
	$Bulan = array(
		"Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September",
		"Oktober", "November", "Dessember"
	);
	$Hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl = substr($date, 8, 2);
	$waktu = substr($date, 11, 5);
	$hari = date("w", strtotime($date));
	return $result = $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;
}

function bulan($date)
{
	$Bulan = array(
		"Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September",
		"Oktober", "November", "Dessember"
	);
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	return $result = $Bulan[(int)$bulan - 1] . " Tahun " . $tahun;
}

function judul_konten()
{
	return $judul = "Selamat Datang Di Aplikasi Sistem";
}

function cek_lhp($id)
{
	$db = \Config\Database::connect();
	$output = $db->table('lhp')->where('kode_material', $id)->orderBy('id', 'desc')->get()->getRowArray();
	if ($output) {
		$sisa = $output['sisa_pro'];
		if ($sisa <= 0) {
			$pilihan = 'disabled="disabled"';
		} else {
			$pilihan = '';
		}
	} else {
		$pilihan = '';
	}

	return $pilihan;
}

function kumulasi($id, $kode)
{
	$db = \Config\Database::connect();

	$output = $db->table('lhp')->where('id', $id)->where('kode_material', $kode)->get()->getRowArray();
	$t_pro = $db->table('lhp')->select('sum(ri_pro) as t')->where('id <=', $id)->where('kode_material', $kode)->get()->getRowArray();
	// dd($t_pro);
	$jml = $t_pro['t'];

	return $jml;
}

function label_grafik($date)
{
	$Bulan = array(
		"Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September",
		"Oktober", "November", "Dessember"
	);
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	return $result = $Bulan[(int)$bulan - 1] . "-" . $tahun;
}

function peserta()
{
	$db = \Config\Database::connect();

	$user = $db->table('tes')->get()->getResultArray();

	// dd($t_pro);
	$jml = count($user);

	return $jml;
}

function mulai($id)
{
	$session = \Config\Services::session();
	$db = \Config\Database::connect();
	$mulai = date('Y-m-d H:i:s');
	$selesai = date('Y-m-d H:i:s', strtotime('+1 hour +0 minutes +3 seconds', strtotime($mulai)));
	$db->table('tes')->set('mulai', $mulai)->set('selesai', $selesai)->where('id', $id)->update();
	$session->set([
		'mulai' => $mulai,
		'selesai' => $selesai
	]);
}

function benar($id, $menit)
{
	$db = \Config\Database::connect();
	$tes = $db->table('tes')->where('id', $id)->get()->getRowArray();

	if ($menit < 3) {
		$poin = $tes['q1'] + 1;
		$db->table('tes')->set('q1', $poin)->where('id', $id)->update();
	}
	if ($menit >= 3 && $menit < 6) {
		$poin = $tes['q2'] + 1;
		$db->table('tes')->set('q2', $poin)->where('id', $id)->update();
	}
	if ($menit >= 6 && $menit < 9) {
		$poin = $tes['q3'] + 1;
		$db->table('tes')->set('q3', $poin)->where('id', $id)->update();
	}
	if ($menit >= 9 && $menit < 12) {
		$poin = $tes['q4'] + 1;
		$db->table('tes')->set('q4', $poin)->where('id', $id)->update();
	}
	if ($menit >= 12 && $menit < 15) {
		$poin = $tes['q5'] + 1;
		$db->table('tes')->set('q5', $poin)->where('id', $id)->update();
	}
	if ($menit >= 15 && $menit < 18) {
		$poin = $tes['q6'] + 1;
		$db->table('tes')->set('q6', $poin)->where('id', $id)->update();
	}
	if ($menit >= 18 && $menit < 21) {
		$poin = $tes['q7'] + 1;
		$db->table('tes')->set('q7', $poin)->where('id', $id)->update();
	}
	if ($menit >= 21 && $menit < 24) {
		$poin = $tes['q8'] + 1;
		$db->table('tes')->set('q8', $poin)->where('id', $id)->update();
	}
	if ($menit >= 24 && $menit < 27) {
		$poin = $tes['q9'] + 1;
		$db->table('tes')->set('q9', $poin)->where('id', $id)->update();
	}
	if ($menit >= 27 && $menit < 30) {
		$poin = $tes['q10'] + 1;
		$db->table('tes')->set('q10', $poin)->where('id', $id)->update();
	}
	if ($menit >= 30 && $menit < 33) {
		$poin = $tes['q11'] + 1;
		$db->table('tes')->set('q11', $poin)->where('id', $id)->update();
	}
	if ($menit >= 33 && $menit < 36) {
		$poin = $tes['q12'] + 1;
		$db->table('tes')->set('q12', $poin)->where('id', $id)->update();
	}
	if ($menit >= 36 && $menit < 39) {
		$poin = $tes['q13'] + 1;
		$db->table('tes')->set('q13', $poin)->where('id', $id)->update();
	}
	if ($menit >= 39 && $menit < 42) {
		$poin = $tes['q14'] + 1;
		$db->table('tes')->set('q14', $poin)->where('id', $id)->update();
	}
	if ($menit >= 42 && $menit < 45) {
		$poin = $tes['q15'] + 1;
		$db->table('tes')->set('q15', $poin)->where('id', $id)->update();
	}
	if ($menit >= 45 && $menit < 48) {
		$poin = $tes['q16'] + 1;
		$db->table('tes')->set('q16', $poin)->where('id', $id)->update();
	}
	if ($menit >= 48 && $menit < 51) {
		$poin = $tes['q17'] + 1;
		$db->table('tes')->set('q17', $poin)->where('id', $id)->update();
	}
	if ($menit >= 51 && $menit < 54) {
		$poin = $tes['q18'] + 1;
		$db->table('tes')->set('q18', $poin)->where('id', $id)->update();
	}
	if ($menit >= 54 && $menit < 57) {
		$poin = $tes['q19'] + 1;
		$db->table('tes')->set('q19', $poin)->where('id', $id)->update();
	}
	if ($menit >= 57 && $menit < 60) {
		$poin = $tes['q20'] + 1;
		$db->table('tes')->set('q20', $poin)->where('id', $id)->update();
	}
}

function salah($id, $menit)
{
	$db = \Config\Database::connect();
	$tes = $db->table('tes')->where('id', $id)->get()->getRowArray();

	if ($menit < 3) {
		$poin = $tes['sq1'] + 1;
		$db->table('tes')->set('sq1', $poin)->where('id', $id)->update();
	}
	if ($menit >= 3 && $menit < 6) {
		$poin = $tes['sq2'] + 1;
		$db->table('tes')->set('sq2', $poin)->where('id', $id)->update();
	}
	if ($menit >= 6 && $menit < 9) {
		$poin = $tes['sq3'] + 1;
		$db->table('tes')->set('sq3', $poin)->where('id', $id)->update();
	}
	if ($menit >= 9 && $menit < 12) {
		$poin = $tes['sq4'] + 1;
		$db->table('tes')->set('sq4', $poin)->where('id', $id)->update();
	}
	if ($menit >= 12 && $menit < 15) {
		$poin = $tes['sq5'] + 1;
		$db->table('tes')->set('sq5', $poin)->where('id', $id)->update();
	}
	if ($menit >= 15 && $menit < 18) {
		$poin = $tes['sq6'] + 1;
		$db->table('tes')->set('sq6', $poin)->where('id', $id)->update();
	}
	if ($menit >= 18 && $menit < 21) {
		$poin = $tes['sq7'] + 1;
		$db->table('tes')->set('sq7', $poin)->where('id', $id)->update();
	}
	if ($menit >= 21 && $menit < 24) {
		$poin = $tes['sq8'] + 1;
		$db->table('tes')->set('sq8', $poin)->where('id', $id)->update();
	}
	if ($menit >= 24 && $menit < 27) {
		$poin = $tes['sq9'] + 1;
		$db->table('tes')->set('sq9', $poin)->where('id', $id)->update();
	}
	if ($menit >= 27 && $menit < 30) {
		$poin = $tes['sq10'] + 1;
		$db->table('tes')->set('sq10', $poin)->where('id', $id)->update();
	}
	if ($menit >= 30 && $menit < 33) {
		$poin = $tes['sq11'] + 1;
		$db->table('tes')->set('sq11', $poin)->where('id', $id)->update();
	}
	if ($menit >= 33 && $menit < 36) {
		$poin = $tes['sq12'] + 1;
		$db->table('tes')->set('sq12', $poin)->where('id', $id)->update();
	}
	if ($menit >= 36 && $menit < 39) {
		$poin = $tes['sq13'] + 1;
		$db->table('tes')->set('sq13', $poin)->where('id', $id)->update();
	}
	if ($menit >= 39 && $menit < 42) {
		$poin = $tes['sq14'] + 1;
		$db->table('tes')->set('sq14', $poin)->where('id', $id)->update();
	}
	if ($menit >= 42 && $menit < 45) {
		$poin = $tes['sq15'] + 1;
		$db->table('tes')->set('sq15', $poin)->where('id', $id)->update();
	}
	if ($menit >= 45 && $menit < 48) {
		$poin = $tes['sq16'] + 1;
		$db->table('tes')->set('sq16', $poin)->where('id', $id)->update();
	}
	if ($menit >= 48 && $menit < 51) {
		$poin = $tes['sq17'] + 1;
		$db->table('tes')->set('sq17', $poin)->where('id', $id)->update();
	}
	if ($menit >= 51 && $menit < 54) {
		$poin = $tes['sq18'] + 1;
		$db->table('tes')->set('sq18', $poin)->where('id', $id)->update();
	}
	if ($menit >= 54 && $menit < 57) {
		$poin = $tes['sq19'] + 1;
		$db->table('tes')->set('sq19', $poin)->where('id', $id)->update();
	}
	if ($menit >= 57 && $menit < 60) {
		$poin = $tes['sq20'] + 1;
		$db->table('tes')->set('sq20', $poin)->where('id', $id)->update();
	}
}
