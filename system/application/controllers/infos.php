<?php

	/**
	 * Controller Infos
	 *
	 * @author		Maran Emil | Maran Project | maran_emil@yahoo.com
	 * @copyright	Copyright 2009, Maran Project.
	 * @link		http://maran-emil.de 
	 * @version		1.0
	 * @license		http://www.opensource.org/licenses/mit-license.php The MIT License
	 */

	class Infos extends Controller {

		/*----------------------------------------------------------
		/ Constructor Infos
		/ @author: Maran Emil
		----------------------------------------------------------*/

		function Infos()
		{
			parent::Controller();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library ('Pagination');
			$this->load->library('session');
			$this->template->write_view('header','elements/header',$data,TRUE);
			$this->template->write_view('footer','elements/footer',$data,TRUE);
		}

		/*----------------------------------------------------------
		/ Infos index
		/ @author: Maran Emil
		----------------------------------------------------------*/
		
		function index()
		{

			// 
			$data["Header"] = "Index";
			$this->template->write_view('content','infos/index',$data,TRUE);
			$this->template->render();
		}

		/*----------------------------------------------------------
		/ Infos contactus
		/ @author: Maran Emil
		----------------------------------------------------------*/

		function contactus()
		{

			// 
			$data["Header"] = "Contact Us";
			$this->template->write_view('content','infos/contactus',$data,TRUE);
			$this->template->render();
		}

		/*----------------------------------------------------------
		/ Infos whatisthis
		/ @author: Maran Emil
		----------------------------------------------------------*/

		function whatisthis()
		{

			// 
			$data["Header"] = "What is this";
			$this->template->write_view('content','infos/whatisthis',$data,TRUE);
			$this->template->render();
		}

	}



/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

?>