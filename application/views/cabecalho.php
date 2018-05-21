<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <?php
      if ($this->session->flashdata("success")) {
        echo '<p class="alert alert-success">' . $this->session->flashdata("success") . '</p>';
      }
      if ($this->session->flashdata("danger")) {
        echo '<p class="alert alert-danger">' . $this->session->flashdata("danger") . '</p>';
      }
       ?>
