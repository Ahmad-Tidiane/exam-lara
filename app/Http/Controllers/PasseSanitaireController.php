<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasseSanitaire;


class PasseSanitaireController extends Controller
{
    public function index()
    {
        $passe_sanitaires = PasseSanitaire::latest()->paginate(5);

        return view('passe_sanitaires.index',compact('passe_sanitaires'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('passe_sanitaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
            'telephone' => 'required|',
            'email' => 'required',
            'type-vaccin' => 'required',
            'cv_recto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
            'cv_verso' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
            'cni_recto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
            'cni_verso' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1999',
            'billet' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:1999',
        ]);

        $input = $request->all();

        $cv_recto = $request->file('cv_recto');
        $cv_verso= $request->file('cv_verso');
        $cni_recto = $request->file('cni_recto');
        $cni_verso = $request->file('cni_verso');
        $billet = $request->file('billet');


        if ($cv_recto && $cv_verso && $cni_recto && $cni_verso && $billet) {
            $destinationPath = 'img/cv_recto/';
            $Moncv_recto = date('YmdHis') . "." . $cv_recto->getClientOriginalExtension();
            $cv_recto->move($destinationPath, $Moncv_recto);
            $input['cv_recto'] = "$Moncv_recto";

            $destinationPath = 'img/cv_verso/';
            $Moncv_verso = date('YmdHis') . "." . $cv_verso->getClientOriginalExtension();
            $cv_verso->move($destinationPath, $Moncv_verso);
            $input['cv_verso'] = "$Moncv_verso";

            $destinationPath3 = 'img/cni_recto/';
            $Moncni_recto = date('YmdHis') . "." . $cni_recto->getClientOriginalExtension();
            $cni_recto->move($destinationPath3, $Moncni_recto);
            $input['cni_recto'] = "$Moncni_recto";

            $destinationPath4 = 'img/cni_verso/';
            $Moncni_verso = date('YmdHis') . "." . $cni_verso->getClientOriginalExtension();
            $cni_verso->move($destinationPath4, $Moncni_verso);
            $input['cni_verso'] = "$Moncni_verso";

            $destinationPath5 = 'img/billet/';
            $Monbillet = date('YmdHis') . "." . $billet->getClientOriginalExtension();
            $billet->move($destinationPath5, $Monbillet);
            $input['billet'] = "$Monbillet";
        }
        else if($cv_recto && $cv_verso && $cni_recto && $cni_verso){
            $destinationPath = 'img/cv_recto/';
            $Moncv_recto = date('YmdHis') . "." . $cv_recto->getClientOriginalExtension();
            $cv_recto->move($destinationPath, $Moncv_recto);
            $input['cv_recto'] = "$Moncv_recto";

            $destinationPath = 'img/cv_verso/';
            $Moncv_verso = date('YmdHis') . "." . $cv_verso->getClientOriginalExtension();
            $cv_verso->move($destinationPath, $Moncv_verso);
            $input['cv_verso'] = "$Moncv_verso";

            $destinationPath3 = 'img/cni_recto/';
            $Moncni_recto = date('YmdHis') . "." . $cni_recto->getClientOriginalExtension();
            $cni_recto->move($destinationPath3, $Moncni_recto);
            $input['cni_recto'] = "$Moncni_recto";

            $destinationPath4 = 'img/cni_verso/';
            $Moncni_verso = date('YmdHis') . "." . $cni_verso->getClientOriginalExtension();
            $cni_verso->move($destinationPath4, $Moncni_verso);
            $input['cni_verso'] = "$Moncni_verso";
        }


        PasseSanitaire::create($input);


        return redirect()->route('passe_sanitaires.index')
                        ->with('success','Product created successfully.');
    }
    public function show(PasseSanitaire $passe_sanitaire)
    {
        return view('passe_sanitaires.show',compact('passe_sanitaire'));
    }
    // public function destroy(PasseSanitaire $passe_sanitaire)
    // {
    //     $passe_sanitaire->delete();

    //     return redirect()->route('passe_sanitaires.index')
    //                     ->with('success','Product deleted successfully');
    // }
}
