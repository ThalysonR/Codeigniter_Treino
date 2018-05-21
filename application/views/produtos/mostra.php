      <?php
        echo '<h1>' . $produto["nome"] . '</h1>';
        echo '<h2>' . numeroEmReais($produto["preco"]) . '</h2>';
        echo '<h2>' . auto_typography(html_escape($produto['descricao'])) . '</h2>';

        echo '<h2>Compre agora!</h2>';

        echo form_open(base_url() . 'vendas/nova');

        echo form_hidden("produto_id", $produto["id"]);

        echo form_label("Data de entrega", "data_de_entrega");
        echo form_input(array(
          "name" => "data_de_entrega",
          "class" => "form-control",
          "id" => "data_de-entrega",
          "maxlength" => "255",
          "value" => ""
        ));

        echo form_button(array(
          "class" => "btn btn-primary",
          "content" => "Comprar",
          "type" =>"submit"
        ));

        echo form_close();
       ?>
