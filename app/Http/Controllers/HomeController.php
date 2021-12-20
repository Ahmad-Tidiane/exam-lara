<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{PasseSanitaire ,Rendezvous };
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $passe_sanitaires = PasseSanitaire::latest()->paginate(5);

    //     return view('admins.index',compact('passe_sanitaires'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }
    public function index(Request $request)
    {

        // $aff = "{{ route('admins.show',$passe_sanitaire->id) }} ";
        if ($request->ajax()) {

            $passe_sanitaires = PasseSanitaire::all();
            return datatables()->of($passe_sanitaires)
                ->addColumn('checkbox', '<input type="checkbox" name="pdr_chec[]" class="pdr_chec">')
                ->rawColumns(['checkbox','action'])
                ->addColumn('action', function ($row) {

                    $html = '<a href="'.route('admins.show',$row->id).'" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Voir" class="edit btn btn-primary btn-sm voirPS"><i class="fas fa-eye text-white"></i></a>';
                    $html = $html.' <a href="javascript:void(0)" data-toggle="Supprimer" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePS"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>';
                    return $html;
                })->toJson();
        }

        return view('admins.index');
    }

    public function store(Request $request)
    {
        $rv = $this->validate($request, [
            'passe_sanitaires_id' => 'required',
            'date' => 'required',
            'heure' => 'required',
            'observation'=>'required',
            'type_envoi' => 'required'
         ]);

         if($rv !== null)
         {
            Rendezvous::create($request->except(['_token']));
            return view('rendezVous.index');

         }
         else{

            $input = $request->all();
            PasseSanitaire::updateOrCreate($input);
            return response()->json(['success'=>'Passe Sanitaire saved successfully.']);
         }

    }

        /**
     * Display the specified resource.
     *
     * @param  \App\PasseSanitaire  $PasseSanitaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $passe_sanitaire = PasseSanitaire::find($id);
        // return response()->json($passe_sanitaire);
        return view('admins.show',compact('passe_sanitaire'));
    }


    // pour le type envoi
    public function type_envoi(Request $request) {

        // Form validation
        $this->validate($request, [
            'passe_sanitaires_id' => 'required',
            'date' => 'required',
            'heure' => 'required',
            'observation'=>'required',
            'type_envoi' => 'required'
         ]);


        //  Store data in database
        Rendezvous::create($request->except(['_token']));

        //  Send mail to admin
        // \Mail::send('mail', array(
        //     'passe_sanitaires_id' => $request->get('passe_sanitaires_id'),
        //     'date' => $request->get('date'),
        //     'heure' => $request->get('heure'),
        //     'observation' => $request->get('observation'),
        //     'type_envoi' => $request->get('type_envoi'),
        // ), function($message) use ($request){
        //     $message->from($request->email);
        //     $message->to('isepdd197@gmail.com', 'MSAS')->subject($request->get('observation'));
        // });

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
    public function destroy($id)
    {
        PasseSanitaire::find($id)->delete();

        return response()->json(['success'=>'Demande supprimer avec  success.']);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("passe_sanitaires")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Passe sanitaire Deleted successfully."]);
    }

}
