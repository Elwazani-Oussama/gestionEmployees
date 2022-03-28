<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\use\Request;
use App\Http\Controllers\Api\EmployeeController;


class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $fillable = [
        'name', 'email', 'age', 'phone_no', 'gender'
    ];

    public $timestamps = false;
}
