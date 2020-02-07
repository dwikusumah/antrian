<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login');
		$this->load->model('Kasir_model');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
		if (!$this->session->userdata('akses')) {
			redirect('Login_Staff');
		}
	}

	public function index() {
		$data['total_antrian'] = $this->M_admin->getCountAntrian();
		$data['sisa_antrian'] = $this->M_admin->getCountSisaAntrian();
		$data['current_antrian'] = $this->M_admin->getCurrentAntrian();
		$data['data_barang'] = $this->M_admin->getAllBarang();
		$this->load->view("Kasir/V_Header");
		$this->load->view("Kasir/V_Index",$data);
		$this->load->view("Kasir/V_Footer");
	}

	public function skipAntrian($id) {
		//$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		//$plaintext_string = $this->encrypt->decode($plaintext_string);
		
		//$id_antrian	= $plaintext_string;
		
		if($this->M_admin->skipAntrian($id)) {
			redirect('Kasir/kasir');
		} else {
			$this->session->set_flashdata('error', 'Jadwal berhasil didelete!');
			redirect('Kasir/kasir');
		}	
	}

	public function checkSession(){
		if (!$this->session->id_user){
			redirect('Login');
		}
	}	

	public function transaksi(){
		$data['transaksi'] = $this->Kasir_model->getAllTransaksi();
		$this->load->view("Kasir/V_Header");
		$this->load->view("Kasir/V_transaksi",$data);
		$this->load->view("Kasir/V_Footer");
	}

	public function add_to_cart(){ //fungsi Add To Cart
        $data = array(
            'id' => $this->input->post('produk_id'), 
            'name' => $this->input->post('produk_nama'), 
            'price' => $this->input->post('produk_harga'), 
            'qty' => $this->input->post('quantity'), 
            'stock' => $this->input->post('produk_stok') 
		);
        $this->cart->insert($data);
        echo $this->show_cart(); //tampilkan cart setelah added
    }
 
    function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                </tr>
            ';
        }
        $output .= '
            <tr>
                <th colspan="3">Total</th>
				<th colspan="2">'.'Rp '.number_format($this->cart->total()).'</th>
				<th> <input type"text" id="kembalians" value="'.$this->cart->total().'" hidden ></th>
			</tr>
        ';
        return $output;
    }
 
    function load_cart(){ //load data cart
        echo $this->show_cart();
    }
 
    function hapus_cart(){ //fungsi untuk menghapus item cart
        $data = array(
            'rowid' => $this->input->post('row_id'), 
            'qty' => 0, 
        );
        $this->cart->update($data);
        echo $this->show_cart();
	}
	
	public function proses_checkout(){
		if($this->session->userdata('akses') != "masuk"){
			$this->session->set_flashdata('message', 'Perlu login untuk membeli / memesan, silahkan login dulu');
            redirect('Login_Staff');
        }else{
        	$cart = $this->cart->contents();
			$total = 0;
			foreach ($cart as $c) {
			$total += $c['subtotal'];
			} 
        	$cek = $this->Kasir_model->cek_table();
        	if ($cek == FALSE) {
        		$id_transaksi = "TRK00001";
        		$noawal = 1;
        	} else {
				$query = $this->db->order_by('id_transaksi', 'DESC')
				    ->limit(1)
				    ->get('tbl_transaksi');
				// $query2 = $this->db->order_by('no', 'DESC')
				//      ->limit(1)
				//      ->get('order_detail');
				if ($query->num_rows()>0) {
					$result = $query->result();
					foreach ($result as $row) {
						$kodewal = $row->id_transaksi;
					}
				}
				// if ($query2->num_rows()>0){
				// 	$result2 = $query2->result();
				// 	foreach ($result2 as $row2) {
				// 		$noawal = $row2->no;
				// 	}
				// }
				$kodeawal=substr($kodewal,4,5);
				$kodeawal = (int)$kodeawal + 1;
				// $noawal = $noawal+1;
				if($kodeawal<10){
				  $id_transaksi='TRK0000'.$kodeawal;
				}else if($kodeawal > 9 && $kodeawal <=99){
				  $id_transaksi='TRK000'.$kodeawal;
				}else{
				  $id_transaksi='TRK000'.$kodeawal;
				}
        	} 
        	// if ($this->input->post('shipping-address')=="ada") {
        	// 	$cek_guest = $this->welcome_model->cek_table_guest();
        	// 	if ($cek == FALSE) {
	        // 		$id_guest = "GUEST1";
	        // 	} else {
	        // 		$query = $this->db->order_by('id_order', 'DESC')
			// 	    ->limit(1)
			// 	    ->get('order_barang');
			// 		if ($query->num_rows()>0) {
			// 			$result = $query->result();
			// 			foreach ($result as $row) {
			// 				$kodewal = $row->id_order;
			// 			}
			// 		}
			// 		$kodeawal=substr($kodewal,5);
			// 		$kodeawal = (int)$kodeawal + 1;
			// 		$id_guest = $kodeawal;
		    //     } 
        	// 	$data = array(
        	// 	  'id_guest' => $id_guest,
		    // 	  'g_nama_depan' => $this->input->post('nama_depan'),	
			//       'g_nama_belakang' => $this->input->post('nama_belakang'),
			//       'g_email' => $this->input->post('email'),
			//       'g_alamat' => $this->input->post('alamat'),
			//       'g_kota' => $this->input->post('kota'),
			//       'g_kecamatan' => $this->input->post('kecamatan'),
			//       'g_kelurahan' =>$this->input->post('kelurahan'),
			//       'g_kodepos' =>$this->input->post('kodepos'),
			//       'g_telepon' =>$this->input->post('no_hp'),
			//       'g_id_pemesan' =>$this->session->userdata('ses_id'),
			//       'nama_depan_pemesan' =>$this->input->post('first-name')
			//       );
        	// 	$data_pesan['guest'] = $this->welcome_model->guest($data);
			//       $pesan = array(
			//       	'id_order' => $id_order,
			//       	'id_user' => $this->session->userdata('ses_id'),
			//       	'subtotal' => $total,
			//       	'proses' => $this->input->post('proses'),
			//       	'pembayaran' => $this->input->post('payment'),
			//       	'status_pembayaran' => $this->input->post('status_pembayaran'),
			//       	'alamat_pengiriman' => $id_guest
			//       	 );	
			//       $data_pesan['pesan']=$this->welcome_model->order_barang_db($pesan);	
			//       $cart = $this->cart->contents();
			//       foreach($cart as $item){
			//       	$data_detail = array(
			//       		'no' => $noawal,
			//       		'id_order' => $id_order,
	        //   			'id_barang' => $item['id'],
	        //   			'jumlah' => $item['qty'],
	        //   			'hargasatuan' => $item['price'],
	        //   			'total_harga' => $item['subtotal']
	        // 	  	);
	        // 	  	$data_pesan['detail']=$this->welcome_model->order_detail_db($data_detail);
	      	// 	  }
			//     $this->cart->destroy();
			//     redirect('welcome/orderdetail',$data_pesan);
        	// // }else{
			      $pesan = array(
			      	'id_transaksi' => $id_transaksi,
			      	'username' => $this->session->userdata('username'),
			      	'total' => $total
			      	 );	
			      $data_pesan = $this->Kasir_model->transaksi($pesan);	
			      $cart = $this->cart->contents();
			      foreach($cart as $item){
					  $stok = $item['stock'] - $item['qty'];
					  $where = array(
						  'id' => $item['id']
					  );
					  $data1 = array(
						  'stok' => $stok
					  );

					  $this->Kasir_model->updateStok($data1,$where);

			      	$data = array(
			      		'id_transaksi' => $id_transaksi,
	          			'id_barang' => $item['id'],
	          			'jumlah' => $item['qty'],
	          			'hargasatuan' => $item['price'],
	          			'total' => $item['subtotal']
	        	  	);
	        	  	$data_pesan = $this->Kasir_model->transaksi_detail($data);
					}
				$idp = $this->input->post('idp');
				$this->M_admin->skipAntrian($idp);
				echo "<script> alert('Transaksi berhasil !'); </script>";		  
			    $this->cart->destroy();
			    echo $this->show_cart();
        	//}
		}
	}

}
