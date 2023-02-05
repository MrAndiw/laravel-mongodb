<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class Transaction extends Model
{
   protected $collection = 'transaction';
   protected $connection = 'mongodb';

}