<?php
defined('BASEPATH') OR exit ('No direct script allowed');

require_once 'application/core/MY_Model.php';

class Article extends MY_Model
{
	function __construct()
	{
		// il parait que cette mention est obligatoire
		parent::__construct();
	}
	public function viewArticle() {

		$this->load->database();

		$query = $this->db->query('SELECT article_name FROM article');

		if($query->num_rows() > 0){

			foreach ($query->result_array() as $data) {

				echo $data['article_name'];

			}

		} else { echo "Pas d'article."; }

		$query->free_result();
	}


	public $article_id;
	public $article_name;
	public $article_body;
	public $article_modified;
	public $article_created;

	public function get_db_table() {
		return 'article';
	}

	public function get_db_table_pk() {
		return 'article_id';
	}

	public function save() {
		$this->article_modified = date('Y-m-d H:i:s');

		return parent::save();
	}
}
