<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
protected $table = "ticket";
protected $primaryKey ="ticket_id";


   protected $fillable = ['ticket_id', 'title', 'description'];
}
