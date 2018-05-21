<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  public function autenticar() {
    $this->load->model("usuarios_model");
    $email = $this->input->post("email");
    $senha = $this->input->post("senha");
    $usuario = $this->usuarios_model->buscarPorEmailESenha($email, $senha);

    // var_dump($usuario);
    if($usuario) {
      $this->session->set_userdata("usuario_logado", $usuario);
      $this->session->set_flashdata("success", "Logado com sucesso");
      // $dados = array("mensagem" => "Logado com sucesso");
    } else {
      // $dados = array("mensagem" => "Usuário ou senha inválida.");
      $this->session->set_flashdata("danger", "Usuario ou senha inválida");

    }
    // var_dump($dados);
    // $this->load->view("login/autenticar", $dados);
    redirect('/');
  }

  public function logout() {
    $this->session->unset_userdata("usuario_logado");
    // $this->load->view("login/logout");
    $this->session->set_flashdata("success", "Deslogado com sucesso");
    redirect('/');
  }
}
 ?>
