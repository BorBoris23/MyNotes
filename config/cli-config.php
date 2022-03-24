<?php
use App\Core\DoctrineManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet(DoctrineManager::getInstance()->entityManager);
