<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkContractType  extends Model
{
    use HasFactory; 
    protected $table = 'work_contract_type';
    protected $fillable = ['designation'];
}
