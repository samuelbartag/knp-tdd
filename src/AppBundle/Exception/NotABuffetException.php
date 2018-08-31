<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 31/08/18
 * Time: 11:21
 */

namespace AppBundle\Exception;


class NotABuffetException extends \Exception
{
    protected $message = 'Favor não misturar dinossauros carnívoros e não-carnívoros. Isso pode se tornar um massacre!';
}