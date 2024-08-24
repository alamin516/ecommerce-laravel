<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermTaxonomy extends Model
{
    protected $primaryKey = 'term_taxonomy_id';

    protected $fillable = [
        'term_id',
        'taxonomy',
        'description',
        'parent',
        'count',
    ];

    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(TermTaxonomy::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(TermTaxonomy::class, 'parent');
    }

    public function relationships()
    {
        return $this->hasMany(TermRelationship::class, 'term_taxonomy_id');
    }
}
