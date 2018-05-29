<?php
// cli-config.php
require_once __DIR__.'/config/DB.php';
$entityManager = DB::getInstance(true);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager->em);