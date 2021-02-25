<?php

/**
 * Controller Users
 * @author         Maran Emil | Maran Project | maran_emil@yahoo.com
 * @copyright      Copyright 2009, Maran Project.
 * @link           http://maran-emil.de
 * @version        1.0
 * @license        http://www.opensource.org/licenses/mit-license.php The MIT License
 */

class Users extends Controller {

   /**
	* Users constructor.
	*/
   function __construct() {
	  parent::__construct();

	  $this->load->helper('url');
	  $this->load->helper('form');
	  $this->load->helper('display');
	  $this->load->helper('flash');
	  $this->load->model('model_user');
	  $this->load->library('session');
	  $this->load->library('Pagination');
	  $this->template->write_view('header', 'elements/header', $data, true);
	  $this->template->write_view('footer', 'elements/footer', $data, true);
   }

   /**
	*
	*/
   function index() {
   }

   /**
	*
	*/
   function login() {
	  if ($this->input->post('username')) {
		 $FormUser = $this->input->post('username');
		 $FormPass = $this->input->post('password');

		 $RsUser       = $this->model_user->getbylogin($FormUser, $FormPass);
		 $data["user"] = $RsUser->result_array(); // set array results

		 if ($data["user"][0]["username"] == $FormUser && $data["user"][0]["password"] == md5($FormPass)) {
			$arUsrData = array(
				'id'        => $data["user"][0]["id"],
				'email'     => $data["user"][0]["username"],
				'username'  => $data["user"][0]["nickname"],
				'logged_in' => true
			);

			$this->session->set_userdata($arUsrData);
			$this->session->set_flashdata('message', "Login Succesfully");
			redirect(base_url() . 'videos', 'refresh');
		 }
		 else {
			$this->session->set_flashdata('message', "Login Failed");
			redirect(base_url() . 'users/login', 'refresh');
		 }
		 //$this->load->vars($vars);
		 //$this->load->view('sw/auth/login');
	  }
	  else {
		 $this->template->write_view('content', 'users/login', $data, true);
		 $this->template->render();
	  }

	  /*print "<pre>";
	  print_r($this->session->all_userdata());

	  Array
	  (
		  [session_id] => 348b98277fc48d0cb4afd672d8f73b87
		  [ip_address] => 127.0.0.1
		  [user_agent] => Mozilla/5.0 (Windows NT 5.1; rv:6.0) Gecko/2010010
		  [last_activity] => 1314801538
		  [username] => Admins
		  [email] => demo@yahoo.com
		  [logged_in] => 1
		  [id] => 1
	  )
	  */
   }

   /**
	*
	*/
   function register() {
	  /*
	  $this->form_validation->set_rules('username', 'Username', 'required|trim|callback__username_check');
	  $this->form_validation->set_rules('password', 'Password', 'required');
	  $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback__email_check');
	  $this->form_validation->set_error_delimiters('', '<br />');

	  if($this->form_validation->run() == true)
	  {
		  $this->ion_auth->register($this->input->post('username'),
			  $this->input->post('password'), $this->input->post('email'), array());
		  $this->ion_auth->login($this->input->post('username'), $this->input->post('password'), true);
		  $url = ($this->session->userdata('last_page') !== FALSE) ? $this->session->userdata('last_page') : base_url();
		  $vars = array(
				  'title' => 'Success!',
				  's_title' => 'Your account has been created',
				  's_desc' => '<a href="'.$url.'">Go back to where you were</a>'
			  );
		  $this->load->vars($vars);
		  $this->load->view('sw/redirect');
	  }
	  else
	  {
		  $error = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

		  $tabs = array(
			  array(
				  'selected' => false,
				  'img' => 'img/login.png',
				  'link' => site_url('auth/login'),
				  'name' => 'Login'
			  ),
			  array(
				  'selected' => true,
				  'img' => 'img/register.png',
				  'link' => site_url('auth/register'),
				  'name' => 'Register'
			  )
		  );

		  $vars = array(
			  'tabs' => $tabs,
			  'title' => 'Register',
			  'error' => $error
		  );
		  $this->load->vars($vars);
		  $this->load->view('sw/auth/register');
	  }*/
   }

   /**
	*
	*/
   function logout() {
	  $this->session->unset_userdata($this->session->all_userdata());
	  $this->session->set_flashdata('message', "Login Failed");
	  redirect(base_url() . 'users/login', 'refresh');
   }

   /**
	* @param $str
	*/
   function _username_check($str) {
      /*
			// Sadly, while Ion does check to see if a username is taken, it
			// does it in a crude fashion, not returning an email and just
			// incrementing a number at the end of the username.
			// Gross.  --John
			$this->load->model('ion_auth_model');
			if($this->ion_auth_model->username_check($this->input->post('username')))
			{
				// NO DUPES FOR YOU!
				$this->form_validation->set_message('_username_check', "Username taken");
				return false;
			}
			return true;
      */
   }

   /**
	* @param $str
	*/
   function _email_check($str) {/*
			$this->load->model('ion_auth_model');
			if($this->ion_auth_model->email_check($this->input->post('email')))
			{
				$this->form_validation->set_message('_email_check', "That email address is in use");
				return false;
			}
			return true;*/
   }
}

