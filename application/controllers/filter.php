<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('Resource');
	}


	public function index()
	{		
		$data['poli'] = $this->Resource->show('bpjs_ref_poli')->result();
		$this->load->view('laporan',$data);

	}
	public function getPoli(){
		$data = $this->Resource->show('bpjs_ref_poli')->result_array();
		header('Content-Type: application/json');
        echo json_encode($data);

	}
	public function getKartu(){
		$query = "SELECT no_kartu
		 			FROM bpjs_rencana_kontrol";
        $data = $this->db->query($query)->result_array();
		header('Content-Type: application/json');

        echo json_encode($data);

	}
	public function getNama(){
		$query = "SELECT nm_pasien
		 			FROM bpjs_rencana_kontrol";
        $data = $this->db->query($query)->result_array();
		header('Content-Type: application/json');
        echo json_encode($data);

	}
	public function getKontrol(){
		
		$koneksi = mysqli_connect('localhost', 'root', '', 'vlcaim2');

		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		/*$periode1 = isset($_POST['periode1']) ? mysqli_real_escape_string($koneksi,$_POST['periode1']) : '';*/
		// $periode1 = isset($_POST['periode2']) ? $this->input->post('periode1') : '';
		// $periode2 = isset($_POST['periode2']) ? $this->input->post('periode2') : '';
		// $poli = isset($_POST['poli']) ? $this->input->post('[poli]') : '';
		$filtertgl = $this->input->post('filtertgl');
		$periode1 = $this->input->post('periode1');
		$periode2 = $this->input->post('periode2');
		$poli = $this->input->post('poli');
		$no_kartu = $this->input->post('no_kartu');
		$nama = $this->input->post('nama');


		
		$offset = ($page-1)*$rows;
		$result = array();
		// $where = 'WHERE a.tgl_rencana_kontrol BETWEEN '.'2022-02-01'.' AND '.'2022-03-14'.'';
		// $tgl1= '2022-03-01';
		// $tgl2= '2022-03-14';
		if(empty( $periode1 || $periode2|| $poli || $no_kartu || $nama)){
			$query = "SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			ORDER BY a.tgl_rencana_kontrol DESC ";
			$result = $this->db->query($query)->result_array();
    		header('Content-Type: application/json');
        	echo json_encode($result);
		}

		elseif (empty( $poli || $no_kartu || $nama)) {
			// $rs = mysqli_query($koneksi,'SELECT COUNT(*)
			// FROM bpjs_rencana_kontrol a
			// JOIN bpjs_ref_poli b
			// ON a.kd_poli = b.kdpoli
			// WHERE a.tgl_rencana_kontrol BETWEEN "'.$periode1.'" AND "'.$periode2.'" 
			
			// ORDER BY a.tgl_rencana_kontrol DESC');
			// $row = mysqli_fetch_row($rs);
			// $result["total"] = $row[0];
		$rs = 'SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			WHERE a.tgl_rencana_kontrol BETWEEN "'.$periode1.'" AND "'.$periode2.'"
			ORDER BY a.tgl_rencana_kontrol DESC';
		// $items = array();
		// while($row = mysqli_fetch_object($rs)){
		//     array_push($items, $row);
		// }
		// $result["rows"] = $items;
			$result = $this->db->query($rs)->result_array();
			header('Content-Type: application/json');
        	echo json_encode($result);
		}

		elseif (empty( $no_kartu || $nama)) {
	
		$rs = 'SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			WHERE a.tgl_rencana_kontrol BETWEEN "'.$periode1.'" AND "'.$periode2.'"
			AND a.kd_poli = "'.$poli.'"
			ORDER BY a.tgl_rencana_kontrol DESC';
			$result = $this->db->query($rs)->result_array();
			header('Content-Type: application/json');
        	echo json_encode($result);
		}
		elseif (empty( $poli || $nama)) {
			
		$rs = 'SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			WHERE a.tgl_rencana_kontrol BETWEEN "'.$periode1.'" AND "'.$periode2.'"
			AND a.no_kartu LIKE "%'.$no_kartu.'%"
			ORDER BY a.tgl_rencana_kontrol DESC';
			$result = $this->db->query($rs)->result_array();
			header('Content-Type: application/json');
        	echo json_encode($result);
		}
		elseif (empty( $poli || $no_kartu)) {
		$rs = 'SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			WHERE a.tgl_rencana_kontrol BETWEEN "'.$periode1.'" AND "'.$periode2.'"
			AND a.nm_pasien LIKE "%'.$nama.'%"
			ORDER BY a.tgl_rencana_kontrol DESC';
			$result = $this->db->query($rs)->result_array();
			header('Content-Type: application/json');
        	echo json_encode($result);
		}
		else{
			
		$rs = 'SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			WHERE a.tgl_rencana_kontrol BETWEEN "'.$periode1.'" AND "'.$periode2.'"
			AND a.kd_poli = "'.$poli.'"
			ORDER BY a.tgl_rencana_kontrol DESC';
			$result = $this->db->query($rs)->result_array();
			header('Content-Type: application/json');
        	echo json_encode($result);
		}
		
	}	
	public function test(){
		$result = array();
		$koneksi = mysqli_connect('localhost', 'root', '', 'vlcaim2');
		$rs = mysqli_query($koneksi,"SELECT COUNT(*)
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			ORDER BY a.tgl_rencana_kontrol DESC");

			$quer = "SELECT COUNT(*)
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			ORDER BY a.tgl_rencana_kontrol DESC";

		// $row = $this->db->query($rs)->result();
			$row = mysqli_fetch_row($rs);
			$result["total"] = $row[0];
			// $rs = mysql_query("SELECT COUNT(*)
			// FROM bpjs_rencana_kontrol a
			// JOIN bpjs_ref_poli b
			// ON a.kd_poli = b.kdpoli
			// ORDER BY a.tgl_rencana_kontrol DESC limit ");
 
			$items = array();
			while($row = mysqli_fetch_object($rs)){
			    array_push($items, $row);
			}
			$result = $items;
			 
			echo json_encode($result);
		// $rs = mysql_query("select count(*) from item where " . $where);
		// $row = mysqli_fetch_row($fetch_row);
		// $rs = 'SELECT COUNT(*)
		// 	FROM bpjs_rencana_kontrol a
		// 	JOIN bpjs_ref_poli b
		// 	ON a.kd_poli = b.kdpoli
		// 	WHERE a.tgl_rencana_kontrol BETWEEN "2022-01-01" AND "2022-03-14"
		// 	ORDER BY a.tgl_rencana_kontrol DESC';
        // $data = $this->db->query($query)->result_array();
		// $aName1 = mysqli_fetch_assoc($rs);
		// $name1 = $aName1['name1'];
		// $data = $this->db->query($rs)->result();
		// header('Content-Type: application/json');
		// echo($data);
        // echo json_encode($data);

	}

	public function getPoliselect(){
		$kdpoli = $this->input->get('kdpoli');
		// $test = 'MAT';
		// $where = array('kdpoli' => $kdpoli);
		$query = "SELECT *
		 			FROM bpjs_ref_poli
		 			WHERE kdpoli ='".$kdpoli."'";
        $data = $this->db->query($query)->result_array();

		// $data = $this->Resource->edit($where,'bpjs_ref_poli')->result_array();
		header('Content-Type: application/json');

        echo json_encode($data);

	}
	public function preview()
	{
		$kd_poli = $this->input->get('kd_poli');
		$tgl_rencana_kontrol = $this->input->get('tgl_rencana_kontrol');
		$tgl_rencana_kontrol2 = $this->input->get('tgl_rencana_kontrol2');


		// $where = array(
		// 		'kd_poli' => $kd_poli,
		// 		'tgl_rencana_kontrol' =>$tgl_rencana_kontrol,
		// 		'tgl_rencana_kontrol' =>$tgl_rencana_kontrol,

		// 	);	
		$query_poli = 'SELECT * FROM bpjs_ref_poli WHERE kdpoli= "'.$kd_poli.'"';
		$data['poli']= $this->db->query($query_poli)->result();;
		$data['tgl_rencana_kontrol']= $tgl_rencana_kontrol;
		$data['tgl_rencana_kontrol2']= $tgl_rencana_kontrol2;


		$query = 'SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			WHERE 
			a.tgl_rencana_kontrol BETWEEN "'.$tgl_rencana_kontrol.'" AND "'.$tgl_rencana_kontrol2.'" AND a.kd_poli = "'.$kd_poli.'"';

		
        $data['preview'] = $this->db->query($query)->result();
		 // $data['preview'] = $this->Resource->edit($where,'bpjs_rencana_kontrol')->result();
		// echo json_encode($data1);
		$this->load->view('kerangka', $data);
		


	}

	
}
