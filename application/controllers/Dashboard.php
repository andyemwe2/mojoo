<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
                $this->data['title']   = 'Majoo Teknologi Indonesia';
                $this->data['isi']     = 'Layout/dashboard_v';
                $this->load->view('welcome_v',$this->data);
	}
}
