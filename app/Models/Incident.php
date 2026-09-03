<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;
    protected $table = 'incidents';
    public $timestamps = false;
    protected $fillable = [
        'num',
		'WFID',
		"date_ouverture",
		'date_cloture',
	    'date_resolution',
		'phase',
		'etat',
		'categorie_reclamation',
		'region',
	    'solution',
		'domaine',
		'sous_domaine',
		'groupe_resolu',
		'incident_Src',
		'lhType',
		"groupe_affectation",
		'csc',
		'zone',
		'groupe_cloture'

    ];

}
