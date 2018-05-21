
      <h1>Vendas</h1>
      <?php
      echo '<table class="table">';
      foreach($produtosVendidos as $produto) {
        echo '<tr>';
        echo '<td>' . $produto['nome'] . '</td>';
        echo '<td>' . dataPostgreParaPtBt($produto['data_de_entrega']) . '</td>';
        echo '<tr>';
      }
      echo '</table>';
      ?>
