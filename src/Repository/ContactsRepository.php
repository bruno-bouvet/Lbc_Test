<?php


namespace App\Repository;

use App\Entity\Contacts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use JMS\Serializer\Tests\Fixtures\Doctrine\SingleTableInheritance\AbstractModel;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ContactsRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contacts::class);
    }

    /** @var string  */
    protected $table = "contacts";

//    /**
//     * ContactModel constructor.
//     * @param Database $database
//     */
//    public function __construct(Database $database)
//    {
//        parent::__construct($database);
//
//        $this->model = new AbstractModel();
//    }

    /**
     * Méthode de récupération des contacts d'un utilisateur
     * @param $idUser
     *
     * @return array|bool|mixed|\PDOStatement
     */
    public function getContactByUser($idUser)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE userId = $idUser");
    }

}