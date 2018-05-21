<?php
  function dataPtBrParaPostgre($dataPtBr) {
    $partes = explode("/", $dataPtBr);
    return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
  }

  function dataPostgreParaPtBt($dataPostgre) {
    $data = new DateTime($dataPostgre);
    return $data->format("d/m/Y");
  }
 ?>
