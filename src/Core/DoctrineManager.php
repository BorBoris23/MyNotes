<?php
namespace App\Core;

use App\Entity\Note;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

final class DoctrineManager
{
    private static $instance;
    public $entityManager;

    public function __construct()
    {
        $this->entityManager = $this->getEntityManager();
    }

    private function getEntityManager()
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;
        $config = Setup::createAnnotationMetadataConfiguration(array("src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

        $connection = [
            'driver' => 'pdo_mysql',
            'host' => 'localhost',
            'dbname'=> 'my_notes',
            'user' => 'root',
            'password' => 'password'
        ];

        return EntityManager::create($connection, $config);
    }

    public static function getInstance() : DoctrineManager
    {
        if(null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    public function add(Note $note, $flush = true)
    {
        $this->entityManager->persist($note);

        if ($flush) {
            $this->entityManager->flush($note);
        }
    }
}
