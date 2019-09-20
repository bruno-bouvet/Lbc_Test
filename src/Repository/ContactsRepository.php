<?php


namespace App\Repository;

use App\Controller\HomeController;
use App\Entity\Contacts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use JMS\Serializer\Tests\Fixtures\Doctrine\SingleTableInheritance\AbstractModel;
use PDOStatement;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ContactsRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contacts::class);
    }

    /**
     * Méthode de récupération des contacts d'un utilisateur
     * @param $idUser
     *
     * @return array|bool|mixed|PDOStatement
     */
    public function findContactByUser($idUser)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.userId = idUser')
            ->setParameter('idUser', $idUser)
            ->getQuery()->getResult();
    }


}