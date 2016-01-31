<?php

namespace SalesModule\Repositories;

use SalesModule\Helpers\DataBaseHelper;
use SalesModule\Helpers\DateHelper;
use SalesModule\Models\Customer;
use PDO;

class CustomerRepository implements IRepository {

    public static function getAll() : array {
        $db = DataBaseHelper::getConnection();
        $handle = $db->prepare('SELECT * FROM Customers;');
        $handle->execute();

        foreach ($handle as $customer) {
            $customers[] = static::createNew($customer);
        }

        //close database connection
        $db = null;

        return $customers ?? [];
    }


    public static function getById(int $id) {
        $db = DataBaseHelper::getConnection();

        $handle = $db->prepare('SELECT * FROM Customers WHERE id = :id');

        $handle->execute(array('id' => $id));

        if ($customer = $handle->fetch()) {
            $customer = static::createNew($customer);
        }

        //close db connection
        $db = null;

        return $customer ?? null;
    }


    public static function getTotalCount() : int {
        $db = DataBaseHelper::getConnection();

        $handle = $db->prepare('SELECT COUNT(*) FROM Customers;');
        $handle->execute();
        $amount = (int) $handle->fetchColumn();

        //close database connection
        $db = null;

        return $amount ?? 0;
    }

    public static function getTopByNumOfOrders($dateFrom = null, $dateTo = null, int $limit = 10) : array {
        $db = DataBaseHelper::getConnection();

        list($dateFrom, $dateTo) = DateHelper::formatDates($dateFrom, $dateTo);

        $handle = static::queryTopByNumOfOrders($dateFrom, $dateTo, $limit, $db);

        // create customers
        foreach ($handle as $customer) {
            $customers[] = static::createNew($customer);
        }

        //close database connection
        $db = null;

        return $customers ?? [];
    }


    private static function queryTopByNumOfOrders($dateFrom, $dateTo, int $limit, $db) {

        $handle = $db->prepare("
                    SELECT  * FROM Customers AS customer
                    LEFT JOIN
                    (
                        SELECT customer_id, COUNT(*) totalCount
                        FROM Orders
                        WHERE (purchase_date BETWEEN :date_from AND :date_to)
                        GROUP BY customer_id
                    )  o ON o.customer_id = customer.id
                    ORDER   BY o.totalCount DESC
                    LIMIT :limit;
            ");

        $handle->bindValue(':date_from', $dateFrom);
        $handle->bindValue(':date_to', $dateTo);
        $handle->bindValue(':limit', $limit, PDO::PARAM_INT);
        $handle->execute();

        return $handle;
    }

    public static function createNew(array $customer) : Customer {
        return new Customer(
            $customer['id'],
            $customer['first_name'],
            $customer['last_name'],
            $customer['email'],
            $customer['created']
        );
    }

} 