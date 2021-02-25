<?php

/**
 * Controller Videos
 * @author         Maran Emil | Maran Project | maran_emil@yahoo.com
 * @copyright      Copyright 2009, Maran Project.
 * @link           http://maran-emil.de
 * @version        1.0
 * @license        http://www.opensource.org/licenses/mit-license.php The MIT License
 */

class Videos extends Controller {

   /**
	* Videos constructor.
	*/
   function __construct() {
	  parent::Controller();
	  $this->load->helper('url');
	  $this->load->helper('form');
	  $this->load->model('model_video');
	  $this->load->model('model_category');
	  $this->load->library('Pagination');
	  $this->load->library('session');
	  $this->template->write_view('header', 'elements/header', '', true);
	  $this->template->write_view('footer', 'elements/footer', '', true);

	  //$this->load->view('elements/header');
	  //$this->load->view('elements/footer');
	  //$this->template->write_view('navigation','elements/header');
   }

   /**
	*
	*/
   function index() {
	  //$offset		= $this->uri->segment(3,0); // &per_page=9
	  //$offset		= preg_replace('/[^\d]/', '', $offset); // allow only int()

	  $offset = end($this->uri->segments);
	  if (!$offset) $offset = 0;
	  $limit = 12; // per page max limit

	  // Count all videos
	  $rSvideos            = $this->model_video->count_all(); // get array Dekore Groupe for dropdown
	  $data["countvideos"] = $rSvideos->result_array(); // set array results

	  // Set pagination
	  $config['cur_page'] = round($offset / $limit) + 1;
	  $config['base_url'] = base_url() . '/videos/index/'; // site_url()

	  $config['uri_segment'] = $offset;
	  $config['num_links']   = 9;

	  $config['total_rows'] = count($data["countvideos"]);
	  $config['per_page']   = $limit;

	  //$config['page_query_string']	= TRUE;
	  $this->pagination->initialize($config);
	  $data['pagination'] = $this->pagination->create_links();

	  // Read videos by limit
	  $sort           = "id";
	  $rSvideos       = $this->model_video->getbypagination($limit, $offset, $sort); // get array Dekore Groupe for dropdown
	  $data["videos"] = $rSvideos->result_array(); // set array results

	  // Render template
	  /*
	  $content = $this->load->view('elements/header',array(),true);
	  $content .= $this->load->view('videos/index',$data,TRUE);
	  $content .= $this->load->view('elements/footer',array(),true);
	  */

	  // Render template
	  $this->template->write_view('content', 'videos/index', $data, true);
	  $this->template->render();
	  //echo $content;

   }

   /**
	*
	*/
   function topvideos() {
	  //$offset		= $this->uri->segment(3,0); // &per_page=9
	  //$offset		= preg_replace('/[^\d]/', '', $offset); // allow only int()

	  $offset = end($this->uri->segments);
	  if (!$offset) $offset = 0;
	  $limit = 12; // per page max limit

	  // Count all videos
	  $rSvideos            = $this->model_video->count_all(); // get array Dekore Groupe for dropdown
	  $data["countvideos"] = $rSvideos->result_array(); // set array results

	  // Set pagination
	  $config['cur_page'] = round($offset / $limit) + 1;
	  $config['base_url'] = base_url() . '/videos/topvideos/'; // site_url()

	  $config['uri_segment'] = $offset;
	  $config['num_links']   = 9;

	  $config['total_rows'] = count($data["countvideos"]);
	  $config['per_page']   = $limit;

	  //$config['page_query_string']	= TRUE;
	  $this->pagination->initialize($config);
	  $data['pagination'] = $this->pagination->create_links();

	  // Read videos by limit
	  $sort           = "views";
	  $rSvideos       = $this->model_video->getbypagination($limit, $offset, $sort); // get array Dekore Groupe for dropdown
	  $data["videos"] = $rSvideos->result_array(); // set array results

	  // Render template
	  $this->template->write_view('content', 'videos/topvideos', $data, true);
	  $this->template->render();
   }

   /**
	*
	*/
   function newvideos() {
	  //$offset		= $this->uri->segment(3,0); // &per_page=9
	  //$offset		= preg_replace('/[^\d]/', '', $offset); // allow only int()

	  $offset = end($this->uri->segments);
	  //$offset = $this->uri->segment(3, '');
	  if (!$offset) $offset = 0;
	  $limit = 12; // per page max limit

	  // Count all videos
	  $rSvideos            = $this->model_video->count_all(); // get array Dekore Groupe for dropdown
	  $data["countvideos"] = $rSvideos->result_array(); // set array results

	  // Set pagination
	  $config['cur_page'] = round($offset / $limit) + 1;
	  $config['base_url'] = site_url() . '/videos/newvideos/'; // site_url() base_url

	  $config['uri_segment'] = $offset;
	  $config['num_links']   = 9;

	  $config['total_rows'] = count($data["countvideos"]);
	  $config['per_page']   = $limit;

	  //$config['page_query_string']	= TRUE;
	  $this->pagination->initialize($config);
	  $data['pagination'] = $this->pagination->create_links();

	  // Read videos by limit
	  $sort           = "id";
	  $rSvideos       = $this->model_video->getbypagination($limit, $offset, $sort); // get array Dekore Groupe for dropdown
	  $data["videos"] = $rSvideos->result_array(); // set array results

	  // Render template
	  $this->template->write_view('content', 'videos/newvideos', $data, true);
	  $this->template->render();
   }

   /**
	*
	*/
   function category() {
	  //$offset = end($this->uri->segments);

	  $ts = $this->uri->total_segments();

	  if ($ts == 4) {
		 $catId  = $this->uri->segment($ts - 1);
		 $offset = end($this->uri->segments);
	  }
	  else {
		 $catId = $this->uri->segment($ts);
	  }

	  if (!$offset) {
		 $offset = 0;
	  }

	  $limit = 12; // per page max limit
	  if (!is_numeric($offset)) {
		 redirect(base_url() . 'videos/', 'refresh');
	  }

	  // Count all videos
	  //$rSvideos = $this->model_video->count_all(); // get array Dekore Groupe for dropdown
	  $rSvideos            = $this->model_video->count_allbycat($catId); // get array Dekore Groupe for dropdown
	  $data["countvideos"] = $rSvideos->result_array(); // set array results

	  // Set pagination
	  $config['cur_page'] = round($offset / $limit) + 1;
	  $config['base_url'] = site_url() . '/videos/category/' . $catId . '/'; // site_url() base_url

	  $config['uri_segment'] = $offset;
	  $config['num_links']   = 9;

	  $config['total_rows'] = count($data["countvideos"]);
	  $config['per_page']   = $limit;

	  //$config['page_query_string']	= TRUE;
	  $this->pagination->initialize($config);
	  $data['pagination'] = $this->pagination->create_links();

	  // Read videos by limit
	  $sort           = "id";
	  $rSvideos       = $this->model_video->getbypaginationandcat($limit, $offset, $sort, $catId); // get array Dekore Groupe for dropdown
	  $data["videos"] = $rSvideos->result_array(); // set array results

	  // Render template
	  $this->template->write_view('content', 'videos/category', $data, true);
	  $this->template->render();
   }

   /**
	*
	*/
   function view() {
	  $offset = $this->uri->segment(3, '');                // get video id

	  $rSvideos      = $this->model_video->getbyid($offset);    // get array Dekore Groupe for dropdown
	  $data["video"] = $rSvideos->result_array();            // set array results

	  $views = $data["video"][0]["views"];                // get current view

	  if ($views == '' or $views == 0) $views = 1;        //assing 1, if it viewes first time
	  elseif ($views > 0) $views++;                        //increase one, if it already viewed

	  $this->model_video->updateTable('videos', array('views' => $views), array('id' => $offset));

	  // Render template
	  $this->template->write_view('content', 'videos/view', $data, true);
	  $this->template->render();
   }

}


/* count segments:
//in library
$ts=$this->CI->uri->total_segments();
$offset= $this->CI->uri->segment($ts);    

//in controller
$ts=$this->uri->total_segments();
$offset= $this->uri->segment($ts);  
*/

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

