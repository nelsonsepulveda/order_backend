<?php
namespace App\Tests\Unit;


use App\Project\Domain\Order\Entity\Order;
use App\Project\Domain\User\Entity\User;
use App\Tests\UnitTest;
use Symfony\Component\HttpFoundation\Request;

class OrderServiceTest extends UnitTest
{

    public function test_add_order_from_service()
    {
        $orderService = self::$kernel->getContainer()->get('project.order.service');

        $orderCustomer = 'Hilary Greer';

        //see in db
        /** @var Order $order */
        $order = $this->em->getRepository(Order::class)->findOneBy(['customer' => $orderCustomer]);

        $this->assertEquals($order->getCustomer(), $orderCustomer);
    }
}
