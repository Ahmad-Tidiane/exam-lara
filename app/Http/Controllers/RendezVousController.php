<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\{Rendezvous , PasseSanitaire};
use Mail;

class RendezVousController extends Controller
{
        // liste des rendez vous confirmez
        public function index(Request $request)
        {
            if ($request->ajax()) {
                $rendezVous = DB::table('passe_sanitaires')
                        ->select(['passe_sanitaires.id' , 'prenom' , 'nom' , 'email' , 'telephone' , 'date' , 'heure' , 'observation' , 'type_envoi'])
                        ->join('rendezvouses', function ($join) {
                            $join->on('passe_sanitaires.id', '=', 'rendezvouses.passe_sanitaires_id');
                                //  ->where('contacts.user_id', '>', 5);
                        })
                        ->get();
                
                return datatables()->of($rendezVous)
                    ->addColumn('checkbox', '<input type="checkbox" name="pdr_chec[]" class="pdr_chec">')
                    ->rawColumns(['checkbox','action'])
                    ->addColumn('action', function ($row) {
                        $html = ' <a href="javascript:void(0)" data-toggle="Supprimer" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePS"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';
                        return $html;
                    })->toJson();
            }
    
            return view('rendezVous.index');
        }
}
