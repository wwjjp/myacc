<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-17
 * Time: 16:12
 */
namespace app\report\model;

use think\Model;

class PaymentMonthModel  extends Model
{
    protected $table = 'payment_month';

    protected function scopeYear($query)
    {
        $query->Distinct(true)->field('year')->order('year');
    }
}