<?php

namespace app\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Termek;
use Illuminate\Http\Request;

class TermekController extends Controller
{
    public function ujfeltoltes(Request $request) {

            $termek = new Termek;

            $termek->nev = $request->input('nev');
            $termek->ar = $request->input('ar');
            $termek->mennyiseg = $request->input('mennyiseg');
            $termek->meret = $request->input('meret');
            $termek->leiras = $request->input('leiras');
            $termek->mutatokep = $request->file('fokep') ->store('public');
            $termek->egerkep = $request->file('egerkep')->store('public');
            $termek->kep_1 = $request->hasFile('kep3') ? $request->file('kep3')->store('public') : null;
            $termek->kep_2 = $request->hasFile('kep4') ? $request->file('kep4')->store('public') : null;
            $termek->kep_3 = $request->hasFile('kep5') ? $request->file('kep5')->store('public') : null;

            $termek->save();
            return redirect('/');
    }
    public function feltoltes(Request $request,$id) {
        $termeknev = Termek::find($id)->nev;
        $nev_ar = Termek::find($id)->ar;
        $nev_mennyiseg = Termek::find($id)->mennyiseg;
        $nev_meret = Termek::find($id)->meret;
        $nev_leiras = Termek::find($id)->leiras;
        $nev_mutatokep = Termek::find($id)->mutatokep;
        $nev_egerkep = Termek::find($id)->egerkep;
        $nev_kep_1 = Termek::find($id)->kep_1;
        $nev_kep_2 = Termek::find($id)->kep_2;
        $nev_kep_3 = Termek::find($id)->kep_3;


        $termek = new Termek;

        $termek->nev = $termeknev;
        $termek->ar = $request->input('ar') ? $request->input('ar'):$nev_ar;
        $termek->mennyiseg = $request->input('mennyiseg')? $request->input('mennyiseg'):$nev_mennyiseg;
        $termek->meret = $request->input('meret') ? $request->input('meret'): $nev_meret;
        $termek->leiras = $request->input('leiras')? $request->input('leiras'):$nev_leiras;
        $termek->mutatokep = $request->input('fokep') ? $request->file('fokep') ->store('public') : $nev_mutatokep;
        $termek->egerkep =  $request->input('egerkep') ? $request->file('egerkep')->store('public'): $nev_egerkep;
        $termek->kep_1 = $request->input('kep3') ? $request->file('kep3') ->store('public') : $nev_kep_1;
        $termek->kep_2 = $request->input('kep4') ? $request->file('kep4')->store('public') : $nev_kep_2;
        $termek->kep_3 = $request->input('kep5') ? $request->file('kep5')->store('public') : $nev_kep_3;

        $termek->save();
        session(['termek_nev' => "Válaszd ki melyiket módosítod"]);
        return redirect(route('termek.termekkez'));
    }

    public function modositas($id) {
        $termek_id = $id;
        $termek_nev = Termek::find($id)->nev;
        $ujtermek = 0;
        session(['termek_id' => $termek_id, 'ujtermek' => $ujtermek, 'termek_nev' => $termek_nev]);
        return redirect(route('termek.termekkez'));
    }

    public function torles($id){

        $termek = Termek::find($id);

        if(!$termek){
            return redirect() -> back() ->with('error','A termék nem található');
        }
        $termek -> delete();

        return redirect()->back()->with('succes', 'A termék sikeresen törölve lett');

    }
}

