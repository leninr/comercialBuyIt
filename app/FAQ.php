<?php

namespace comercialBuyIt;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = "faqs";
    public $primaryKey  = 'idFaq';
}
