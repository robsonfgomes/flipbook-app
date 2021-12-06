<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;

    protected $table = 'revista';

    /**
     * The atributtes are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'edicao',
        'descricao',
        'thumbnail',
        'pdf'        
    ];    
}
