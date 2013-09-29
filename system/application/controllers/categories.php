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

	class Categories extends Controller {

		/*----------------------------------------------------------
		/ Constructor Infos
		/ @author: Maran Emil
		----------------------------------------------------------*/

		function Categories()
		{
			parent::Controller();

			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library ('Pagination');
			$this->load->library('session');
			$this->load->model('model_category');
			$this->template->write_view('header','elements/header',$data,TRUE);
			$this->template->write_view('footer','elements/footer',$data,TRUE);
		}

		/*----------------------------------------------------------
		/ Categories index
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
		/ Categories edwas
		/ @author: Maran Emil
		----------------------------------------------------------*/

	}



/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

?>