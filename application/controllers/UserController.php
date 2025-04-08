<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class UserController extends CI_Controller {

    public function index(){
      $this->load->database();
      $this->load->view('template/header');
      $this->load->view('user');
      $this->load->view('template/footer');
    }

    public function addUser(){
      $this->load->view('template/header');
      $this->load->view('create_user');
      $this->load->view('template/header');
    }
  }
?>