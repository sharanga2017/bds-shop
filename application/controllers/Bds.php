<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bds extends CI_Controller{

	function  __construct(){
		parent::__construct();

		// Load cart library
		$this->load->library('cart');

		// Load product model
		$this->load->model('bd');
	}

	function index(){
		$data = array();

		// Fetch products from the database
		$data['bds'] = $this->bd->getRows();

		// Load the product list view
		$this->load->view('bds/index', $data);
	}

	function addToCart($proID){

		// Fetch specific product by ID
		$bd = $this->bd->getRows($proID);

		// Add product to the cart
		$data = array(
			'id'    => $bd['id'],
			'qty'    => 1,
			'price'    => $bd['prix_public'],
			'name'    => $bd['titre'],
			'ref' => $bd['ref']
		);
		$this->cart->insert($data);

		// Redirect to the cart page
		redirect('cart/');
	}

}

