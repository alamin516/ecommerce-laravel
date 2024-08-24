<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermRelationship extends Model
{
    protected $primaryKey = ['object_id', 'term_taxonomy_id'];
    public $incrementing = false;

    protected $fillable = [
        'object_id',
        'term_taxonomy_id',
        'term_order',
    ];

    public function taxonomy()
    {
        return $this->belongsTo(TermTaxonomy::class, 'term_taxonomy_id');
    }
}
