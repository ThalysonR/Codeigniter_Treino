<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Vendas extends CI_Controller {
    public function nova() {
      $this->load->model("vendas_model");
      $this->load->helper("date");
      $venda = array(
        "produto_id" => $this->input->post("produto_id"),
        "comprador_id" => $this->session->userdata("usuario_logado")["id"],
        "data_de_entrega" => dataPtBrParaPostgre($this->input->post("data_de_entrega"))
      );
      $this->vendas_model->salva($venda);

      // $this->load->library("email");
      // $config['protocol'] = "smtp";
      // $config['smtp_host'] = 'ssl://smtp.gmail.com';

      $this->session->set_flashdata("success", "Pedido de compra efetuado com sucesso.");
      redirect('/');
    }

    public function index() {
      // $this->output->enable_profiler(TRUE);

      // $usuario = $this->session->userdata("usuario_logado");
      $usuario = autoriza();
      $this->load->helper("date");
      $this->load->model("produtos_model");
      $produtosVendidos = $this->produtos_model->buscaVendidos($usuario);
      $dados = array("produtosVendidos" => $produtosVendidos);

      $this->load->template("vendas/index", $dados);
    }
  }
 ?>
