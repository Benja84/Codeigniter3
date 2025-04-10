<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class UserController extends CI_Controller {

    public function __construct() {
      parent::__construct();
      
      $this->load->model('UserModel','user');
      $this->load->library('form_validation','url'); // Load the library
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
        $config = [
          'upload_path' => './uploads/',
          'allowed_types' => 'jpg|png',
          'max_size' => 510000,
          'file_name' => $file_name
        ];
        $this->load->library('upload',$config);
print_r($file_name);
        if (!$this->upload->do_upload('image'))
        {
          $error = array('error' => $this->upload->display_errors());

          $this->load->view('template/header');
          $this->load->view('create_user',$error);
          $this->load->view('template/header');
        }else{
          print_r($this->upload->data());
          $data = [
            'title'=>$this->input->post('title'),
            'content'=>$this->input->post('content'),
            'image'=>$this->upload->data('file_name'),
            'created_at' => date('Y-m-d H:i:s')
          ];
          $this->load->model('UserModel','user');
          $this->user->insertUser($data);
          $this->session->set_flashdata('success',"Article créé avec succé");
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
        $this->session->set_flashdata('success',"Mise à jour avec succé");
        redirect(base_url('user'));
      }else{
        $this->editArticle($id);
        // redirect(base_url('user/add'));
      }
    }

    public function delete($id){
      $this->user->deleteArticle($id);
      $this->session->set_flashdata('success',"Suppression d'article avec succé");
      redirect(base_url('user'));
    }


  }
?>