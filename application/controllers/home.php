<?php 

/**
 * 
 */
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
	}

	public function index(){
		$data = array(
			'data_produk' => $this->m_produk->data_produk_all()->result(),
			'view' => 'v_save_data_json',
		 );
		$this->load->view('v_template',$data);
	}

	public function save_data_json(){
		$detail = json_decode($this->input->get('DETAIL'));
		$dataDuplikat = array();
	if ($detail) {
		

		foreach($detail as $key => $value){

		$id_produk = $value->{'id_produk'};
		$this->db->select('* from produk where id_produk="'.$id_produk.'"',false);
		$data_id_produk = $this->db->get()->row();

		if ($data_id_produk) {
			array_push($dataDuplikat, 
				array(
				"id_produk"                => $value->{'id_produk'},
                "nama_produk"              => $value->{'nama_produk'},
                "harga"              => $value->{'harga'},
                "kategori"            	=> $value->{'kategori'},
                "status"        => $value->{'status'},
				)
			);
			
		}else{
			$dataDetail= array(
                "id_produk"                => $value->{'id_produk'},
                "nama_produk"              => $value->{'nama_produk'},
                "harga"              => $value->{'harga'},
                "kategori"            	=> $value->{'kategori'},
                "status"        => $value->{'status'},
            );
              
              $this->db->trans_start();
              $this->db->insert("produk", $dataDetail);
              $this->db->trans_complete();
		}
			
		}
	}
		// print_r($dataDuplikat);
		
		redirect('produk','refresh');
	}
}
?>