<?php

require_once('executor.php');

$executor = new Executor();

$data = $_POST;

return $executor->setAssociation($data);