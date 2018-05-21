    <table class="table">
    <?php


      echo '<h1>Produtos</h1>';
      foreach ($produtos as $produto) {
        echo '<tr>';
        echo '<td>' . anchor("produtos/{$produto['id']}", $produto["nome"]) .'</td>';
        echo '<td>' . character_limiter($produto["descricao"], 10) . '</td>';
        echo '<td>' . numeroEmReais($produto["preco"]) . '</td>';
        echo '<tr>';
      }
     ?>
   </table>


   <?php
      if (!$this->session->userdata("usuario_logado")) {
        echo '<h1>Login</h1>';
        echo form_open(base_url(). "login/autenticar");

        echo form_label("Email", "email");
        echo form_input(array(
          "name" => "email",
          "id" => "email",
          "class" => "form-control",
          "maxlenght" => "255"
        ));

        echo form_label("Senha", "senha");
        echo form_password(array(
          "name" => "senha",
          "id" => "senha",
          "class" => "form-control",
          "maxlength" => "255"
        ));

        echo form_button(array(
          "class" => "btn btn-primary",
          "content" => "Login",
          "type" => "submit"
        ));

        echo form_close();


        echo '<h1>Cadastro</h1>';

        echo form_open(base_url()."usuarios/novo");

        echo form_label("Nome", "nome");
        echo form_input(array(
          "name" => "nome",
          "id" => "nome",
          "class" => "form-control",
          "maxlength" => "255"
        ));

        echo form_label("Email", "email");
        echo form_input(array(
          "name" => "email",
          "id" => "email",
          "class" => "form-control",
          "maxlenght" => "255"
        ));

        echo form_label("Senha", "senha");
        echo form_password(array(
          "name" => "senha",
          "id" => "senha",
          "class" => "form-control",
          "maxlength" => "255"
        ));

        echo form_button(array(
          "class" => "btn btn-primary",
          "content" => "Cadastrar",
          "type" => "submit"
        ));

        echo form_close();
    } else {
      echo '<a href="'. base_url() . 'login/logout" class="btn btn-primary">Logout</a>' ;
      echo '<a href="'. base_url() . 'produtos/formulario" class="btn btn-primary">Novo produto</a>' ;
    }
    ?>
