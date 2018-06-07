<?php
/**
 * Created by PhpStorm.
 * User: wwj
 * Date: 2018-05-15
 * Time: 15:02
 */

namespace app\settings\model;

use think\Model;

class Account extends Model
{
    public function getStateAttr($value)
    {
        $state= ['Y' =>'有效','N' => '失效'];
        return $state[$value];
    }
}