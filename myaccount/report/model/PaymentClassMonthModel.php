<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-16
 * Time: 23:34
 */
namespace app\report\model;

use think\Model;

class PaymentClassMonthModel  extends Model
{
    protected $table = 'payment_class_month';

    protected function scopeIndexList($query)
    {
        $query->order('amount');
    }

    protected function scopeIndexChart($query)
    {
        $query->order('classname');
    }

    protected function scopeYear($query)
    {
        $query->Distinct(true)->field('year')->order('year');
    }

    protected function scopeMonth($query)
    {
        $query->Distinct(true)->field('month')->order('month');
    }
}