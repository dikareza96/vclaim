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
	public function getKontrol(){
		$data = $this->Resource->show('bpjs_rencana_kontrol')->result_array();
		$query = 'SELECT a.no_surat_kontrol, a.tgl_rencana_kontrol,a.no_sep ,a.no_kartu, a.nm_pasien,a.kd_poli ,b.nm_poli , a.diagnosa
			FROM bpjs_rencana_kontrol a
			JOIN bpjs_ref_poli b
			ON a.kd_poli = b.kdpoli
			ORDER BY a.tgl_rencana_kontrol DESC
		 			';
        $data = $this->db->query($query)->result_array();
		header('Content-Type: application/json');

        echo json_encode($data);

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
