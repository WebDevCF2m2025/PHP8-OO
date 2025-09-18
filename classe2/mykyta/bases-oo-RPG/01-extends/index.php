<?php

declare(strict_types=1);

include "model/MyPerso.php";
include "model/OrcPerso.php";

$perso = new MyPerso("Pierre");
$persoOrc = new OrcPerso("Marc");


$perso -> name = "Pierre";
$persoOrc -> name = "Charlie";




var_dump ($perso, $persoOrc);

