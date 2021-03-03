<?php


namespace App\Project\Domain\Order;


use App\Project\Domain\Order\Entity\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    /**
     * @param Order $order
     * @return array
     */
    public function transform(Order $order)
    {
        return [
            'id' => $order->getId(),
            'date' => $order->getdate(),
            'customer' => $order->getCustomer(),
            'address1' => $order->getAddress1(),
            'city' => $order->getCity(),
            'postcode' => $order->getPostcode(),
            'country' => $order->getCountry(),
            'amount' => $order->getAmount(),
            'status' => $order->getStatus(),
            'deleted' => $order->getDeleted(),
            'last_modified' => $order->getLast_modified()
        ];
    }

}