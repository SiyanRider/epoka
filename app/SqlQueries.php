<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class SqlQueries extends Model
{
    public static function getMissions (){
        $missions= DB::select('SELECT user_nom, user_prenom, miss_debut, miss_fin, ville_nom_reel, miss_id, isValidate, isRembour FROM mission, utilisateurs, villes_france_free WHERE miss_ville_id = ville_id AND mission.user_id = utilisateurs.user_id');
        return $missions;
    }
    public static function validateMission ($id){
        DB::table('mission')
                ->where('miss_id',$id)
                ->update(['isValidate' => 1]);
    }
    public static function getPaiements(){
        $missions = DB::select('SELECT user_nom, user_prenom, miss_debut, miss_fin, ville_nom_reel, miss_id, isValidate, isRembour, user_agence FROM mission, utilisateurs, villes_france_free, distance, agence WHERE miss_ville_id = ville_id AND mission.user_id = utilisateurs.user_id AND user_agence = ag_id AND isValidate = 1');
        return $missions;
    }
    public static function validatePaiement($id){
        DB::table('mission')
                ->where('miss_id',$id)
                ->update(['isRembour' => 1]);
    }
    public static function connect($login){
        $query = DB::table('utilisateurs')->where('user_id',$login)->first();
        return $query;
    }
    public static function getDistance(){
        $query = DB::select('SELECT V1.ville_nom_reel AS ville1, V2.ville_nom_reel AS ville2, dist_km FROM distance, villes_france_free AS V1, villes_france_free AS V2 WHERE dist_ville_1 = V1.ville_id AND dist_ville_2 = V2.ville_id');
        return $query;
    }
    public static function getAgences(){
        $query = DB::select('SELECT * FROM agence, villes_france_free WHERE ag_ville = ville_id');
        return $query;
    }
    public static function getVillesMissions(){
        $query = DB::select('SELECT ville_nom_reel,ville_id FROM villes_france_free, mission WHERE miss_ville_id = ville_id ');
        return $query;
    }
    public static function setDistance($ville1,$ville2,$km){
        DB::table('distance')
                ->insert([
                    ['dist_ville_1' => $ville1, 'dist_ville_2' => $ville2, 'dist_km' => $km]
                ]);
    }
}
