<?php
  class Usuarios_model extends CI_Model {
    public function salva(Array $usuario) {
      $this->db->insert("usuarios", $usuario);

      // foreach ($usuario as $key => $value) {
      //   $this->db->insert($key, $value);
      // }
    }

    public function buscarPorEmailESenha($email, $senha) {
      $this->db->where("email", $email);
      $this->db->where("senha", $senha);
      return $this->db->get("usuarios")->row_array();
    }
  }
 ?>
