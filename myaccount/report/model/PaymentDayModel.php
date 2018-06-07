<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-17
 * Time: 21:37
 */
namespace app\report\model;

use think\Model;

class PaymentDayModel  extends Model
{
    protected $table = 'payment_day';

    protected function scopeIndexChart($query,$begindate,$enddate)
    {
        $query->order('date');
    }
}
