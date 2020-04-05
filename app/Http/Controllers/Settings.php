<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use App\SqlQueries;

class Settings extends Controller
{
    public function index(){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_paiements'] == '1'){
                return view('settings');
            }
            else{
                header('Location: /forbiden-error');
                exit();
            }
        }
        else{
            header('Location /');
            exit();
        }
    }
    public function prixKilometre (){
        session_start();
        if (isset($_SESSION['login'])){
            $requette = DB::table('settings')
                    ->select('*')
                    ->where('settings-id',1)
                    ->get();
            return view('settings-prix', compact('requette'));
        }
        else{
            header('Location /');
            exit();
        }
    }
    public function modify(){
        session_start();
        if (isset($_SESSION['login'])){
            $km = $_POST['km'];
            $heberg = $_POST['heberg'];
            if (!empty($km)){
                DB::table('settings')
                ->where('settings-id',1)
                ->update(['prix_km' => $km]);
            }
            if (!empty($heberg)){
                DB::table('settings')
                ->where('settings-id',1)
                ->update(['prix_heberg' => $heberg]);
            }
            header('Location: /settings/prix');
            exit;
        }
        else{
            header('Location: /');
            exit();
        }
    }
    public function indexDistance(){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_paiements'] == '1'){
                $agences = SqlQueries::getAgences();
                $villes = SqlQueries::getVillesMissions();
                $distances = SqlQueries::getDistance();

                return view('settings-distances', compact('agences','villes','distances'));
            }
            else{
                return view('forbiden-error');
            }
        }
        else{
            header('Location : /');
            exit();
        }
    }
    public function setDistance(){
        session_start();
        if (isset($_SESSION['login'])){
            if ($_SESSION['view_paiements'] == '1'){
                $ville1 = $_POST['ville1'];
                $ville2= $_POST['ville2'];
                $km = $_POST['km'];

                SqlQueries::setDistance($ville1,$ville2,$km);
                header('Location: /settings/distances');
                exit();
            }
            else{
                header('Location : /forbiden-error');
                exit();
            }
        }
        else{
            header('Location : /');
            exit();
        }

    }
}