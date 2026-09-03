<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Carbon\Carbon;


class IncidentController extends Controller
{
    public function euga(Request $request)
    {
        $test = -1;

        return view('euga', compact('test'));
    }

    public function zone(Request $request)
    {
        $test = -1;
        $diffrence = 0;
        $end = 0;
        $start = 0;

        return view('zone', compact('test', 'end', 'start', 'diffrence'));
    }

    public function euga_recherche(Request $request)
    {
        $incomingfields = $request->validate([
            'debut' => 'required',
            'fin' => 'required',
        ]);

        $information=$request;
        $test = 1;
        $tot=Incident::where('groupe_affectation', 'LIKE', '%' . $request->euga . '%')->where('categorie_reclamation', 'LIKE', '%Dérangement fixe%')->where('date_ouverture', '>=', $request->debut)->where('date_ouverture', '<=', $request->fin)->count();
        $ouvert = Incident::where('groupe_affectation', 'LIKE', '%' . $request->euga . '%')->where('categorie_reclamation', 'LIKE', '%Dérangement fixe%')->where('date_ouverture', '>=', $request->debut)->where('date_ouverture', '<=', $request->fin)
            ->where('etat', 'LIKE', '%' . 'Ouvert' . '%')->get();
        $resol = Incident::where('groupe_affectation', 'LIKE', '%' . $request->euga . '%')->where('categorie_reclamation', 'LIKE', '%Dérangement fixe%')->where('date_ouverture', '>=', $request->debut)->where('date_ouverture', '<=', $request->fin)
            ->where('etat', 'LIKE', '%' . 'Résolu' . '%')->get();
        $closed = Incident::where('groupe_affectation', 'LIKE', '%' . $request->euga . '%')->where('categorie_reclamation', 'LIKE', '%Dérangement fixe%')->where('date_ouverture', '>=', $request->debut)->where('date_ouverture', '<=', $request->fin)
            ->where('etat', 'LIKE', '%'.'Clôturé'.'%')->get();
        $infouvcs = new Collection();
        $info = 0;
        $supouvcs = new Collection();
        $supo = 0;
        $entreouvcs = new Collection();
        $entreo = 0;
        $infrescs = new Collection();
        $infr=0;
        $suprescs = new Collection();
        $supr=0;
        $entrerescs = new Collection();
        $entrer=0;
        $infclocs = new Collection();
        $infc = 0;
        $supclocs = new Collection();
        $supc = 0;
        $entreclocs = new Collection();
        $entrec = 0;

       foreach ($closed as $value) {
            $start = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_ouverture)->format('Y-m-d H:i'));
            if($value->date_resolution == null) {
            $end = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_cloture)->format('Y-m-d H:i'));}
            else {
                $end = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_resolution)->format('Y-m-d H:i'));
            }
            $diffrence = $start->DiffInHours($end);

            if ($diffrence <= 24) {

                $infc = $infc + 1;

                $infclocs->push($value);
            }
            if (($diffrence > 24) && ($diffrence <= 48)) {
                $entrec = $entrec + 1;
                $entreclocs->push($value);
            }
            if ($diffrence > 48) {

                $supc = $supc + 1;
                $supclocs->push($value);
            }
        }


        foreach ($resol as $value) {
            $start = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_ouverture)->format('Y-m-d H:i'));
            if($value->date_resolution == null) {
                $end = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_cloture)->format('Y-m-d H:i'));}
                else {
                    $end = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_resolution)->format('Y-m-d H:i'));
                }
            $diffrence = $start->DiffInHours($end);

            if ($diffrence <= 24) {

                $infr = $infr + 1;

                $infrescs->push($value);
            }
            if (($diffrence > 24) && ($diffrence <= 48)) {
                $entrer = $entrer + 1;
                $entrerescs->push($value);
            }
            if ($diffrence > 48) {

                $supr = $supr + 1;
                $suprescs->push($value);
            }
        }


        foreach ($ouvert as $value) {
            $start = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_ouverture)->format('Y-m-d H:i'));
            $end = new Carbon(Carbon::now()->format('Y-m-d H:i'));
            $diffrence = $start->DiffInHours($end);

            if ($diffrence <= 24) {

                $info = $info + 1;

                $infouvcs->push($value);
            }
            if (($diffrence > 24) && ($diffrence <= 48)) {
                $entreo = $entreo + 1;
                $entreouvcs->push($value);
            }
            if ($diffrence > 48) {

                $supo = $supo + 1;
                $supouvcs->push($value);
            }
        }


        return view('euga', compact('test', 'ouvert', 'resol', 'entrec', 'supc', 'infc', 'infclocs', 'entreclocs', 'supclocs', 'entreo', 'supo', 'info', 'infouvcs', 'entreouvcs', 'supouvcs','suprescs','infrescs','entrerescs','entrer','supr','infr','tot','information'));
    }

    public function incident_recherche(Request $request)
    {
        $incomingfields = $request->validate([
            'debut' => 'required',
            'fin' => 'required',
        ]);
        $test = 1;
        $in=Incident::All()->first();
        $var=$in->num;
        $incidents = Incident::where('zone', 'LIKE', '%' . $request->zone . '%')->where('categorie_reclamation', 'LIKE', '%Dérangement fixe%')->where('date_ouverture', '>=', $request->debut)->where('date_ouverture', '<=', $request->fin)
            ->get();




        $infcs = new Collection();
        $supcs = new Collection();
        $entrecs = new Collection();
        $infreliqcs = new Collection();
        $supreliqcs = new Collection();
        $entrereliqcs = new Collection();
        $info = $request;
        $total = $incidents->count();
        $inf = 0;
        $entre = 0;
        $sup = 0;
        $infreliq = 0;
        $entrereliq = 0;
        $supreliq = 0;





        foreach ($incidents as $value) {
            $start = new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_ouverture)->format('Y-m-d H:i'));

            if (strcmp($value->etat, 'Ouvert') == 0) {
                $end = new Carbon(Carbon::now()->format('Y-m-d H:i'));
                $diffrence = $start->DiffInHours($end);

                if ($diffrence <= 24) {
                    $infreliq = $infreliq + 1;
                    $infreliqcs->push($value);
                    $inf = $inf + 1;
                    $infcs->push($value);
                }



                if (($diffrence > 24) && ($diffrence <= 48)) {
                    $entre = $entre + 1;
                    $entrecs->push($value);
                    $entrereliq = $entrereliq + 1;
                    $entrereliqcs->push($value);
                }
                if ($diffrence > 48) {

                    $sup = $sup + 1;
                    $supcs->push($value);
                    $supreliq = $supreliq + 1;
                    $supreliqcs->push($value);
                }
            } else {
                $end= new Carbon(Carbon::createFromFormat('d/m/Y H:i', $value->date_resolution )->format('Y-m-d H:i'));
                $diffrence = $start->DiffInHours($end);
                if ($diffrence <= 24) {
                    $inf = $inf + 1;
                    $infcs->push($value);
                }



                if (($diffrence > 24) && ($diffrence <= 48)) {
                    $entre = $entre + 1;
                    $entrecs->push($value);
                }
                if ($diffrence > 48) {

                    $sup = $sup + 1;
                    $supcs->push($value);

                }


            }
        }








        return view('zone', compact('sup', 'inf', 'entre', 'supreliq', 'infreliq', 'entrereliq', 'total', 'test', 'incidents', 'info', 'infcs', 'infreliqcs', 'entrecs', 'entrereliqcs', 'supcs', 'supreliqcs','in'));
    }
}
