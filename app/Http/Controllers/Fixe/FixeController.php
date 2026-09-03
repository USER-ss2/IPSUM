<?php

namespace App\Http\Controllers\Fixe;

use App\Models\User;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FixeController extends Controller
{
    public function index(){
        $max=Incident::select('zone',  DB::raw('count(num) as total'))->where('zone','not like','')->groupBy('zone')->orderBy('total','DESC')->get();
        $nb_users=User::all()->count();
        $var=$max->first();
        return view("dashboard",compact('var','nb_users'));
    }

}
