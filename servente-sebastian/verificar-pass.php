<?php

$password = "asdasd";

$hash = '$2y$10$L8Uw37w/F1n.dheSc/9bI.jOUZRBYdg5JQxU.bSz.KG/FbIaAmWXS';

if(password_verify($password, $hash)) {
    echo "El password '" . $password . "' coincide con el hash.";
} else {
    echo "El password '" . $password . "' NO coincide con el hash.";
}