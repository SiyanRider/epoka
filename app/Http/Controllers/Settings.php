<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DB;

class Settings extends Controller
{
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
}