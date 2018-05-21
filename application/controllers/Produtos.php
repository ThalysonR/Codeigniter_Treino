<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
  public function index()
  {
    // $this->output->enable_profiler(TRUE);

    $this->load->model("produtos_model");
    $this->load->helper(array("currency"));
    $produtos = $this->produtos_model->buscaTodos();

    $dados = array("produtos" => $produtos);

    $this->load->template('produtos/index.php', $dados);
  }

  public function formulario() {
    autoriza();
    $this->load->template("produtos/formulario");
  }

  public function novo() {
    // $usuarioLogado = $this->session->userdata("usuario_logado");
    $usuarioLogado = autoriza();
    $this->load->library("form_validation");
    $this->form_validation->set_rules("nome", "nome", "required|min_length[5]|callback_nao_tenha_a_palavra_melhor");
    $this->form_validation->set_rules("descricao", "descricao", "trim|required|min_length[10]");
    $this->form_validation->set_rules("preco", "preco", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    if($sucesso) {
      $produto = array(
        "nome" => $this->input->post("nome"),
        "descricao" => $this->input->post("descricao"),
        "preco" => $this->input->post("preco"),
        "usuario_id" => $usuarioLogado["id"]
      );
      // var_dump($produto);
      $this->load->model("produtos_model");
      $this->produtos_model->salvar($produto);
      $this->session->set_flashdata("success", "Produto salvo com sucesso");
      redirect("/");
    } else {
      $this->load->template("produtos/formulario");
    }
  }

  public function mostra($id) {
    // $id = $this->input->get("id");

    $this->load->model("produtos_model");
    $this->load->helper(array("currency", "typography"));
    $produto = $this->produtos_model->busca($id);
    $dados = array("produto" => $produto);
    $this->load->template("produtos/mostra", $dados);
  }

  public function nao_tenha_a_palavra_melhor($nome) {
    $posicao = strpos($nome, "melhor");
    if($posicao != fALSE) {
      return TRUE;
    } else {
      $this->form_validation->set_message("nao_tenha_a_palavra_melhor", "O campo '%s' não pode conter a palavra 'melhor'");
      return FALSE;
    }
  }
}
 ?>
