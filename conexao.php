<?php
define('HOST', 'bancowill.cnx6eqa5fl6m.us-east-2.rds.amazonaws.com');
define('USUARIO', 'adminwill');
define('SENHA', 'kllmkll27');
define('DB', 'bancowill');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');