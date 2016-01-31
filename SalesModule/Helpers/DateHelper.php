<?php

namespace SalesModule\Helpers;

use \PDO;

class DateHelper {

    //formats and sets default for dates, by default last month
    public static function formatDates($dateFrom, $dateTo) {

        if(is_null($dateFrom) || empty($dateFrom)) {
            $dateFrom = new \DateTime();
            $dateFrom->modify('-1 months');
            $dateFrom = $dateFrom->format(DATE_FORMAT);
        }

        if(is_null($dateTo) || empty($dateTo)) {
            $dateTo = (string) date(DATE_FORMAT);
        }

        return [$dateFrom, $dateTo];
    }


} 