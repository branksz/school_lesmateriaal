<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestSubject extends Model
{
	protected $table = 'subject_requests';
	protected $primaryKey = 'id';
	protected $fillable = ['subject'];
	public $timestamps = true;
}