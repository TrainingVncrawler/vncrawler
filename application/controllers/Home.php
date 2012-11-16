<?php
/*
 * @author : Tran Nhu Quynh
 */
class Home extends CI_Controller{
    //put your code here

    public function  __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("my_layout"); // Sử dụng thư viện layout
        $this->my_layout->setLayout("layout/dashboard"); // load file layout chính (view/layout/frontend.php)
    }
    // Controller mặc định cho trang chủ
    public function index(){
        $data['title'] = "Đăng nhập hệ thống";
        
        // Truyền dữ liệu vào view và hiển thị
        $this->my_layout->view("frontend/login",$data);
    }
   public function book(){
        $data['title'] = "Danh sách sách trên mây";
		//$this->load->Model("MHome");
		//$data['items'] = $this->MHome->getData();
        $this->my_layout->view("frontend/book",$data);
    }
	public function book_download(){
        $data['title'] = "Download";
		$this->load->Model("MHome");
		$data['id'] = $this->MHome->insert_bookdownload();
        $this->my_layout->view("frontend/book_download",$data);
    }
	public function book_downloaded(){
        $data['title'] = "Danh sách sách đã download";
		$this->load->Model("MHome");
		$data['ds'] = $this->MHome->getbookdownload();
        $this->my_layout->view("frontend/book_downloaded",$data);
    }
	public function book_buy(){
        $data['title'] = "Danh sách sách đã mua";
		//$this->load->Model("MHome");
		//$data['id'] = $this->MHome->readbook();
        $this->my_layout->view("frontend/book_buy",$data);
    }
	public function book_propertier(){
        $data['title'] = "Danh sách sách đã mua";
		$this->load->Model("MHome");
		$data['id'] = $this->MHome->readbook();
        $this->my_layout->view("frontend/book_propertier",$data);
    }
}
?>
