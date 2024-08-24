<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $primaryKey = 'term_id';

    protected $fillable = [
        'name',
        'slug',
        'term_group',
    ];

    public function taxonomies()
    {
        return $this->hasMany(TermTaxonomy::class, 'term_id');
    }
}
