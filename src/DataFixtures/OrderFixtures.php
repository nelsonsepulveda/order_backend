<?php

namespace App\DataFixtures;

use App\Project\Domain\Order\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class OrderFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $orderJsonFile = file_get_contents('./orders.json', true);
        $orderJsonData = json_decode($orderJsonFile, true);

        foreach($orderJsonData as $field => $value) {
            $order = new Order();

            $order->setId($value['id']);
            $order->setDate($value['date']);
            $order->setCustomer($value['customer']);
            $order->setAddress1($value['address1']);
            $order->setCity($value['city']);
            $order->setPostcode($value['postcode']);
            $order->setCountry($value['country']);
            $order->setAmount($value['amount']);
            $order->setStatus($value['status']);
            $order->setDeleted($value['deleted']);
            $order->setLast_modified($value['last_modified']);

            $manager->persist($order);
            $manager->flush();
        }
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}
