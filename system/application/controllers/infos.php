<?php

/**
 * Controller Infos
 * @author         Maran Emil | Maran Project | maran_emil@yahoo.com
 * @copyright      Copyright 2009, Maran Project.
 * @link           http://maran-emil.de
 * @version        1.0
 * @license        http://www.opensource.org/licenses/mit-license.php The MIT License
 */

class Infos extends Controller {

   /**
	* Infos constructor.
	*/
   function __construct() {
	  parent::Controller();

	  $this->load->helper('url');
	  $this->load->helper('form');
	  $this->load->library('Pagination');
	  $this->load->library('session');
	  $this->template->write_view('header', 'elements/header', $data, true);
	  $this->template->write_view('footer', 'elements/footer', $data, true);
   }

   /**
	*
	*/
   function index() {
	  $data["Header"] = "Index";
	  $this->template->write_view('content', 'infos/index', $data, true);
	  $this->template->render();
   }

   /**
	*
	*/
   function contactus() {
	  $data["Header"] = "Contact Us";
	  $this->template->write_view('content', 'infos/contactus', $data, true);
	  $this->template->render();
   }

   /**
	*
	*/
   function whatisthis() {
	  $data["Header"] = "What is this";
	  $this->template->write_view('content', 'infos/whatisthis', $data, true);
	  $this->template->render();
   }

}


/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

