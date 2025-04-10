<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class UserController extends CI_Controller {

    public function __construct() {
      parent::__construct();
      
      $this->load->model('UserModel','user');
      $this->load->library('form_validation'); // Load the library
    }
    public function index(){
      $data['data'] = $this->user->getAll();

      $this->load->view('template/header');
      $this->load->view('user',$data);
      $this->load->view('template/footer');
    }

    public function addUser(){
      $this->load->view('template/header');
      $this->load->view('create_user');
      $this->load->view('template/header');
    }

    public function store(){
      $this->form_validation->set_rules('title','Titre','trim|required');
      $this->form_validation->set_rules('content','Contenue','trim|required');
      if($this->form_validation->run()){
        $file_name = str_replace(' ','-',$_FILES['image']['name']);
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']        = $file_name;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
          $imageerror = array('error' => $this->upload->display_errors());
          $this->load->view('template/header');
          $this->load->view('create_user',$imageerror);
          $this->load->view('template/header');
        }else {
          $data = [
            'title'=>$this->input->post('title'),
            'content'=>$this->input->post('content'),
            'image'=>$this->upload->data('file_name'),
            'created_at' => date('Y-m-d H:i:s')
          ];
          $this->load->model('UserModel','user');
          $this->user->insertUser($data);
          redirect(base_url('user'));
        }
      }else{
        $this->addUser();
        // redirect(base_url('user/add'));
      }
    }

    public function editArticle($id){
      $data['article'] = $this->user->getById($id);
      $this->load->view('template/header');
      $this->load->view('editArticle',$data);
      $this->load->view('template/footer');
    }

    public function update($id){
      $this->form_validation->set_rules('title','Titre','trim|required');
      $this->form_validation->set_rules('content','Contenue','trim|required');
      if($this->form_validation->run()){
        $data = [
          'title'=>$this->input->post('title'),
          'content'=>$this->input->post('content'),
          'image'=>$this->input->post('image'),
        ];
        $this->user->updateData($id,$data);
        redirect(base_url('user'));
      }else{
        $this->editArticle($id);
        // redirect(base_url('user/add'));
      }
    }

    public function delete($id){
      $this->user->deleteArticle($id);
      redirect(base_url('user'));
    }


  }
?>