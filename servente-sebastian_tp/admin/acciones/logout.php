<?php

require_once '../../data/bootstrap.php';
require_once '../../libraries/auth.php';
//require_once '../../libraries/usuarios.php';

authLogout();

header('Location: ../index.php?s=login');

