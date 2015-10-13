<?php
/**
 * Created by PhpStorm.
 * User: Marco
 * Date: 20/06/15
 * Time: 16:13
 */

namespace Sigep\Entities;


use Illuminate\Database\Eloquent\Model;

class Entity extends Model {


    public static function getClass()
    {
        return get_class(new static);
    }
}