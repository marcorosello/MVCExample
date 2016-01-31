<?php

namespace SalesModule\Repositories;

use SalesModule\Helpers\DataBaseHelper;
use SalesModule\Helpers\DateHelper;
use PDO;
use SalesModule\Models\Order;
use SalesModule\ValueObjects\Money;

class OrderRepository implements IRepository {

    public static function getAll() {
        $db = DataBaseHelper::getConnection();
        $handle = $db->prepare('SELECT * FROM Orders;');
        $handle->execute();

        foreach ($handle as $order) {
            $orders[] = static::createNew($order);
        }

        //close database connection
        $db = null;

        return $orders ?? [];
    }


    public static function getById(int $id) {
        $db = DataBaseHelper::getConnection();

        $handle = $db->prepare('SELECT * FROM Orders WHERE id = :id');
        $handle->execute(array('id' => $id));

        if ($row = $handle->fetch()) {
            $order = new Order();
        }

        //close db connection
        $db = null;

        return $order ?? null;
    }

    public static function getTopOrdersByRevenue($dateFrom = null, $dateTo = null, int $limit = 10) : array {
        $db = DataBaseHelper::getConnection();

        list($dateFrom, $dateTo) = DateHelper::formatDates($dateFrom, $dateTo);

        $handle = static::queryTopOrdersByRevenue($dateFrom, $dateTo, $limit, $db);

        foreach ($handle as $order) {
            $newOrder = static::createNew($order);
            $newOrder->setTotalRevenue(new Money($order['totalPrice']));
            $orders[] = $newOrder;
        }

        //close database connection
        $db = null;

        return $orders ?? [];
    }

    protected static function queryTopOrdersByRevenue($dateFrom, $dateTo, int $limit, $db) {
        $handle = $db->prepare("
                SELECT  * FROM Orders AS o
                LEFT JOIN (
                    SELECT order_id, SUM(price) totalPrice
                    FROM OrderItems
                    GROUP BY order_id
                ) oi ON o.id = oi.order_id
                WHERE (purchase_date BETWEEN :date_from AND :date_to)
                ORDER BY oi.totalPrice DESC
                LIMIT :limit;
        ");

        $handle->bindValue(':date_from', $dateFrom);
        $handle->bindValue(':date_to', $dateTo);
        $handle->bindValue(':limit', $limit, PDO::PARAM_INT);
        $handle->execute();

        return $handle;
    }

    public static function getTotalCount() : int {
        $db = DataBaseHelper::getConnection();

        $handle = $db->prepare('SELECT COUNT(*) FROM Orders;');
        $handle->execute();
        $amount = (int) $handle->fetchColumn();

        //close database connection
        $db = null;

        return $amount ?? 0;
    }

    public static function createNew(array $order) : Order{
        return new Order(
            $order['id'],
            $order['country'],
            $order['device'],
            $order['purchase_date']
        );
    }
} 