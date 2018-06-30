<?php

class Cart extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
	}

	function add_to_cart(){ //fungsi Add To Cart
		$data = array(
			'id' => $this->input->post('produk_id'), 
			'name' => $this->input->post('produk_nama'), 
			'price' => $this->input->post('produk_harga'), 
			'qty' => $this->input->post('quantity'), 
		);
		$this->cart->insert($data);
		echo $this->show_cart(); //tampilkan cart setelah added
		

	}

	function show_cart(){ //Fungsi untuk menampilkan Cart
		if (count($this->cart->contents()) != null) {
			
		$output = '';
		$no = 0;
		
		foreach ($this->cart->contents() as $items) {			
			$no++;
			$output .='
				<tr>
					<th scope="row">'.$no.'</th>
					<td>'.$items['name'].'</td>
					<td>'.number_format($items['price']).'</td>
					<td>x'.$items['qty'].'</td>
					<td>'.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="4">'.'Rp '.number_format($this->cart->total()).'</th>
				
			</tr>
			<tr>
			<th colspan="3"></th>
			<th colspan="5">
			<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#CalenderModalNew">Proses</button>
			</th>
			</tr>
			
			
			
		';

	} else {
		$output = '';
		$no = 0;
	}
		return $output;
	

	}


function show_cartmodal(){ //Fungsi untuk menampilkan Cart di modal
		if (count($this->cart->contents()) != null) {
			
		$output = '';
		$no = 0;
		
		foreach ($this->cart->contents() as $items) {			
			$no++;
			$output .='
				<tr>
					<th scope="row">'.$no.'</th>
					<td>'.$items['name'].'</td>
					<td>'.number_format($items['price']).'</td>
					<td>x'.$items['qty'].'</td>
					<td>'.number_format($items['subtotal']).'</td>
					<td><button type="button" id="'.$items['rowid'].'" class="hapus_cart btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></button></td>
				</tr>
			';
		}
		$output .= '
			<tr>
				<th colspan="3">Total</th>
				<th colspan="4">'.'Rp '.number_format($this->cart->total()).'</th>
				
			</tr>
			
			
			
			
		';

	} else {
		$output = '';
		$no = 0;
	}
		return $output;
	

	}

	function load_cart(){ //load data cart
		echo $this->show_cart();
	}
	function load_cartmodal(){ //load data cart
		echo $this->show_cartmodal();
	}

	function hapus_cart(){ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);

		
			echo $this->show_cart();
		
		
	}

	function count_cart(){ //menghitung jumlah cart
		echo count($this->cart->contents());
	}

	function proses_cart() {
		$this->load->model('m_product');
		$this->load->model('m_orders');
		$kodedetails = $this->m_product->codeDetail();
		$ordersid = $this->m_product->create_code();
		$add['ordersID'] = $ordersid; 
		$add['ordersIDDetails'] = $kodedetails;
		$add['ordersTableNumber'] = $this->input->post('nomeja');
		$add['userID'] = $this->session->userdata('userID');
		$add['ordersDate']= date('Y-m-d H:i:s');
		$add['total']= "";
		$add['status']= "0";

		foreach ($this->cart->contents() as $items) {		

			$detail[] = "('".$kodedetails."', '".$items['name']."', '".$items['id']."', '".$items['qty']."', '".$items['subtotal']."')";		
		}
		$adddetail = implode(',', $detail);

		if ($hasil = $this->m_orders->create($add) && $hasil = $this->m_orders->createDetailOrder($adddetail)) {
			helper_log("add", "Menambah Pesanan Pada No. Meja :".$this->input->post('nomeja')." dan Id Pesanan :".$ordersid);
			$this->cart->destroy();
			$this->session->set_flashdata('success', 'User successfully generated.');
			redirect(base_url());
		}

	}
}