<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'user_question';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
