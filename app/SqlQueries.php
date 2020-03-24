<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SqlQueries extends Model
{
    public static function getMissions (){
        $missions= DB::select('SELECT user_nom, user_prenom, miss_debut, miss_fin, ville_nom_reel, miss_id, isValidate FROM mission, utilisateurs, villes_france_free WHERE miss_ville_id = ville_id AND mission.user_id = utilisateurs.user_id');
        return $missions;
    }
    public static function validateMission ($id){
        DB::table('mission')
                ->where('miss_id',$id)
                ->update(['isValidate' => 1]);
    }
    public static function getPaiements(){
        $missions = DB::select('SELECT user_nom, user_prenom, miss_debut, miss_fin, ville_nom_reel, miss_id, isValidate, isRembour FROM mission, utilisateurs, villes_france_free WHERE miss_ville_id = ville_id AND mission.user_id = utilisateurs.user_id AND isValidate = 1');
        return $missions;
    }
    public static function validatePaiement($id){
        DB::table('mission')
                ->where('miss_id',$id)
                ->update(['isRembour' => 1]);
    }
}
