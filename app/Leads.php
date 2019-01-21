<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
protected $table = "leads";
protected $primaryKey ="leads_id";

protected $fillable = ['first_name', 'last_name', 'email','phone'];
}
