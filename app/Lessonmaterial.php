<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessonmaterial extends Model
{
	protected $table = 'Lessonmaterial';
	protected $primaryKey = 'id';
	protected $fillable = ['status','name','slug','introduction','imagename','filename','week'];
}