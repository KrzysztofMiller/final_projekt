<?php

$config = json_decode(
    file_get_contents("config.php")
);

var_dump($config);