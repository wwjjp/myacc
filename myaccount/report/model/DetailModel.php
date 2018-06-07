<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-16
 * Time: 23:34
 */
namespace app\report\model;

use think\Model;

class DetailModel  extends Model
{
    protected $table = 'detail';

    protected function scopeIndex($query)
    {
        $query->order('date desc')->order('id desc');
    }

    protected function scopeAccountBalanceDetailList($query)
    {
        $query->order('date desc')->order('id desc');
    }

    protected function scopePaymentClassMonthTableDetailList($query)
    {
        $query->where('word','记')->order('date desc')->order('id desc');
    }


}