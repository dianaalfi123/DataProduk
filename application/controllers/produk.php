<?php 

/**
 * 
 */
class Produk extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
	}

	public function index(){

		$data = array(
			'data_produk' => $this->m_produk->data_produk_all()->result(),
			'data_produk_bisa_dijual' => $this->m_produk->data_produk_bisa_dijual()->result(),
			'view' => 'v_produk',
		 );
		$this->load->view('v_template',$data);
	}

	//proses tambah produk
	public function add_produk(){
		$this->m_produk->add_produk();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menambah Produk');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menambah Produk');
		redirect('produk','refresh');
	}
	//untuk mengambil detail produk berdasarkan id produk yang diambil
	public function detail_produk($id){
		$data = $this->m_produk->data_produk_detail($id);
		echo json_encode($data);
	}

	//untuk mengubah produk berdasarkan id produk yang diambil
	public function edit_produk(){
		$this->m_produk->edit_produk();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Mengubah Produk');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Mengubah Produk');
		redirect('produk','refresh');
	}
	//untuk menghapus produk berdasarkan id produk yang diambil
	public function delete_produk(){
		$this->m_produk->delete_produk();
		$this->session->set_flashdata('pesan_sukses', 'Sukses Menghapus Produk');
		$this->session->set_flashdata('pesan_gagal', 'Gagal Menghapus Produk');
		redirect('produk','refresh');
	}
}
?>