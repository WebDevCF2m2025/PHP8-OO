<?php

declare (strict_types=1);

require_once "model/MyPersoAbstract.php";
require_once "model/MyPerso.php";


$perso1 = new MyPerso("Pierre");
$perso2 = new MyPerso("Other");

var_dump($$perso1, $perso2);