<?php

include "functions.php";
$id = $_GET['id'];
delete(connection(), $id);
header("Location: index.php");
