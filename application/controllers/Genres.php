<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Genres extends CI_Controller
{
	function  __construct(){
		parent::__construct();

		// Load cart library
		$this->load->library('cart');

		// Load product model
		$this->load->model('genre');
	}

	function index($id){
		$data = array();

		// Fetch products from the database
		$data['grs'] = $this->genre->getRows($id);
	//	dump($this->genre);die();

		// Load the product list view
		$this->load->view('genres/index', $data);
	}

}
