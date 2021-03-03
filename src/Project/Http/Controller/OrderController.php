<?php


namespace App\Project\Http\Controller;

use App\Project\App\Support\FractalService;
use App\Project\Domain\Order\OrderService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Swagger\Annotations as SWG;

class OrderController
{
    /**
     * @var OrderService
     */
    private $orderService;

    /**
     * @var FractalService
     */
    private $fractalService;
    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(
        OrderService $orderService,
        FractalService $fractalService,
        RouterInterface $router
    )
    {
        $this->orderService = $orderService;
        $this->fractalService = $fractalService;
        $this->router = $router;
    }


    /**
     * @param Request $request
     * @return JsonResponse
     * @SWG\Response(
     *     response=200,
     *     description="Returns the order collection"
     * )
     * @SWG\Parameter(
     *     name="page",
     *     in="query",
     *     type="integer",
     *     description="current page",
     *     default="1"
     * )
     * @SWG\Parameter(
     *     name="per_page",
     *     in="query",
     *     type="integer",
     *     description="limit per page",
     *     default="10"
     * )
     * @SWG\Parameter(
     *     name="search_str",
     *     in="query",
     *     type="string",
     *     description="search string",
     *     default=""
     * )
     * @SWG\Tag(name="orders")
     */
    public function index(Request $request)
    {
        $orders = $this->orderService->getOrders($request, $this->router);

        return new JsonResponse($this->fractalService->transform($orders));
    }

    /**
     * @param $id
     * @return JsonResponse
     * @SWG\Response(
     *     response=200,
     *     description="Returns single order Item"
     * )
     * @SWG\Response(
     *     response=500,
     *     description="Returns error"
     * )
     * @SWG\Tag(name="order")
     */
    public function order($id)
    {
        try {
            $order = $this->orderService->getOrderById($id);
            return new JsonResponse($this->fractalService->transform($order));
        }catch (\Exception $e) {
            return new JsonResponse($this->fractalService->transform($e->getMessage(), false), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

   /**
     * @param Request $request
     * @return JsonResponse
     * @SWG\Response(
     *     response=200,
     *     description="Returns the updated order"
     * )
     * @SWG\Tag(name="orders")
     */

    public function update(Request $request)
    {
        $updatedOrder = $this->orderService->updateOrder($request);
        return new JsonResponse($this->fractalService->transform($updatedOrder));
    }
}