<?php


namespace App\Project\Infrastructure\Order;

use App\Project\App\Support\AppEntityRepository;
use App\Project\Domain\Order\Entity\Order;
use Symfony\Component\HttpFoundation\Request;

class OrderRepository extends AppEntityRepository
{

    public function getOrders(Request $request)
    {
        $qb = $this->createQueryBuilder('a')
        ->where('a.customer LIKE :search_str')
        ->orWhere('a.status LIKE :search_str')
        ->setParameter('search_str', "%{$request->get('search_str')}%");

        return $qb->getQuery();
    }

    public function save(Order $order)
    {
        $this->_em->persist($order);
        $this->_em->flush();
    }
}