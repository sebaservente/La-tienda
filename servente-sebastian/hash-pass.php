<?php

$password = "asdasd";

// usamos el la function password_hash / md5 no recomendada $hashmd5 = md5($password);

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "el hash para el password '" . $password . "' es: " . $hash;