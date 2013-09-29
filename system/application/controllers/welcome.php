<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('model_video');
		$this->template->write_view('navigation','elements/navigation');
	}
	
	function index()
	{

		// select videos 
		$videos = array();
		$this->template->write_view('content','elements/welcome',$data);
		$this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

?>