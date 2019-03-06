<?php
/**
 * Created by PhpStorm.
 * User: Gaap_
 * Date: 18/12/2017
 * Time: 18:32
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\Armoires;

class ArmoiresRepository extends EntityRepository
{
    public function getArmoires($nom){
        $qb = $this->createQueryBuilder('a');

        $qb->where('a.nom = :nom')
            ->setParameter('nom', $nom);

        return $qb->getQuery()->getResult();
    }

    public function getArmoireByName($name){
        $qb = $this->createQueryBuilder('a');

        $qb->where($qb->expr()->like('a.nom',$qb->expr()->literal('%'.$name.'%')));
        return $qb->getQuery()->getResult();
    }

}