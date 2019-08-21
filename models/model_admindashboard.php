<?php

class model_admindashboard extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getStat()
    {
        $today_date = date('Y/m/d');
        $time = time();
        $last_week_time = $time - (7 * 24 * 3600);
        $last_week_date = date('Y/m/d', $last_week_time);
        $dates = $this->getRange($last_week_date, $today_date);
        $orders = $this->getOrder();

        $order_stat = [];

        foreach ($dates as $date) {
            $date_jalali = self::miladiToJalali($date);
            $order_stat[$date_jalali]=0;
        }

        foreach ($orders as $order) {
            $jalali_date = $order['date'];
            $miladi_date = self::jalaliToMiladi($jalali_date);
            if (in_array($miladi_date, $dates)) {
                $order_stat[$jalali_date] = $order_stat[$jalali_date] + 1;
            }
        }

        return $order_stat;
    }

    function getRange($startDate, $lastDate)
    {
        $dates = [];
        $current = strtotime($startDate);
        $last = strtotime($lastDate);

        while ($current <= $last) {
            $dates[] = date('Y/m/d', $current);
            $current = strtotime('+1 day', $current);
        }
        return $dates;
    }

    function getOrder()
    {
        $sql = "select * from tbl_order";
        $res = $this->doSelect($sql);
        return $res;
    }

}