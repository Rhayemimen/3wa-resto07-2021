<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //protected $table = "nom de la table en singulier"
    //protected $primaryKey = "nom du cle primaire autre que id"
    //public $incrementing = false si je veux désactiver l'autoincrémentation du clé primaire
    public $timestamps = false; //il suppose que chaque tableau à 2 colonnes de creating date et undate date
}
