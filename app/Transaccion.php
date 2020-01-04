<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PayPal\Api\Transaction;

class Transaccion extends Model
{
    //use transactions table
    protected $table = 'transactions';
}


?>
