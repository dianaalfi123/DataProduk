<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function data_produk_all(){
        $this->db->select('*');
        $this->db->from('produk');
        return $this->db->get();
    }
    public function data_produk_bisa_dijual(){
        $this->db->select('* from produk where status="bisa dijual"',false);
        return $this->db->get();
    }
    public function data_produk_detail($a){
        $this->db->select('* from produk where id_produk="'.$a.'"',false);
        return $this->db->get()->row();
    }
    public function add_produk(){
    	$data = array(
    		'nama_produk' 		=> $this->input->post('nama_produk'),
    		'kategori'			=> $this->input->post('kategori'),
    		'harga'				=> $this->input->post('harga'),
    		'status'			=> $this->input->post('status')
    	);
    	$this->db->insert('produk',$data);
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }
    public function edit_produk(){
    	$id_produk = $this->input->post('id_produk');
    	$data = array(
    		'nama_produk' 		=> $this->input->post('nama_produk'),
    		'kategori'			=> $this->input->post('kategori'),
    		'harga'				=> $this->input->post('harga'),
    		'status'			=> $this->input->post('status')
    	);
    	$this->db->update("produk", $data, array("id_produk" => $id_produk));
    	if($this->db->affected_rows()>0){
            return TRUE;
        }else{
            return FALSE;
        }

    }

    public function delete_produk(){
    	$id_produk = $this->input->post('id_produk');
    	$this->db->delete("produk", array("id_produk" => $id_produk));
    }
}
