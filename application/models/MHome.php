<?php
class MHome extends CI_Model
{
    public function __construct()
	{
        parent::__construct();
        $this->load->database();
    }
	function getData()
	{
		$colum = "id%2Ctitle%2Ccreator%2Ccover%2Cisbn%2Csku%2Cidentifier%2Cbook_type";
		$limit = "100";
		$oncloud = array(
               'colum' => $colum,
			   'limit' => $limit
            );
        return $oncloud;
    }
	function readbook()
	{
		$Id = $this->input->post('identifier');
        return $Id;
    }
	function insert_bookdownload()
	{
		$txt = $this->input->post('download_txtfile');
		$html = $this->input->post('download_htmlfile');
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$creator = $this->input->post('creator');
		$cover = $this->input->post('cover');
		$book_type = $this->input->post('book_type');
		$identifier = $this->input->post('identifier');
		$sku = $this->input->post('sku');
		$sql = $this->db->select('Identifier')->from('book')->where('Identifier =', $identifier); 
		$sql = $this->db->get();
        $result = $sql->result();
		if($result== null)
		{
			$array = array('ID' => $id, 'Tensach' => $title, 'Anhdaidien' => $cover,'Tacgia' => $creator, 'Theloai' => $book_type,'Identifier' => $identifier,'Sku' => $sku);
		    $this->db->insert('book', $array); 
		}
        // Trả kết quả về cho Controller
        if(isset($_POST['Downloadtxt']))
            {
                return $txt;
            }
		 if(isset($_POST['Downloadhtml']))
            {
                return $html;
            }
    }
	
	function bookdownload(){
         
        $tenfile = $this->input->post('download_file');
         
        // Trả kết quả về cho Controller
        return $tenfile;
    }
	function getbookdownload(){
         
        // Lấy tất cả dữ liệu trong bảng data
        $sql = $this->db->get('book');
        $result = $sql->result();
         
        // Trả kết quả về cho Controller
        return $result;
    }
} 
