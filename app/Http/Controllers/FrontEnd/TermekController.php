<?php

namespace app\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Termek;
use App\Models\Kosar;
use Illuminate\Http\Request;

class TermekController extends Controller
{
    public function index()
    {
        $termekek = Termek::all();
        $termekek = $termekek->groupBy('nev');
        return view('frontend.fooldal', ['termekek' => $termekek]);
    }

    public function kosarfeltoltes(Request $request, $id, $user_id) {
        $termek = Termek::find($id);

        if (!$termek) {
            return redirect()->route('kosar.home')->with('error', 'A kiválasztott termék nem található.');
        }

        $meret = $request->input('meret');

        // Ellenőrizzük, hogy van-e megadva méret
        if ($meret) {
            // Megkeressük a kosár elemet a megadott mérettel
            $kosarElem = Kosar::where('termek_id', $termek->id)
                ->where('profil_id', $user_id)
                ->where('fizetve', 0)
                ->where('meret', $meret)
                ->first();

            if ($kosarElem) {
                // Ha már létezik, növeljük a mennyiséget
                $kosarElem->mennyiseg += 1;
                $kosarElem->save();
            } else {
                // Ha nem létezik, létrehozzuk az új kosár elemet
                $kosarElem = new Kosar([
                    'termek_id' => $termek->id,
                    'profil_id' => $user_id,
                    'mennyiseg' => 1,
                    'meret' => $meret,
                    'fizetve' => 0,
                ]);
                $kosarElem->save();
            }
        }

        return redirect()->route('kosar.home')->with('success', 'A termék sikeresen hozzáadva a kosárhoz.');
    }

    public function kosartorles($id, $user_id) {
        $termek = Termek::find($id);

        if (!$termek) {
            return redirect()->route('kosar.home')->with('error', 'A kiválasztott termék nem található.');
        }

        $kosarElem = Kosar::where('termek_id', $termek->id)
            ->where('profil_id', $user_id)
            ->where('fizetve', 0)
            ->first();

        if ($kosarElem) {
            $kosarElem->delete();

            return redirect()->route('kosar.home')->with('success', 'A termék sikeresen eltávolítva a kosárból.');
        } else {
            return redirect()->route('kosar.home')->with('error', 'A kiválasztott termék nem található a kosárban.');
        }
    }


    public function kosar() {
        $user_id = auth()->id();
        $kosarElemek = Kosar::where('profil_id', $user_id)
            ->where('fizetve', 0)
            ->with('termek')
            ->get();

        $teljesAr = 0;
        return view('frontend.kosar', compact('kosarElemek', 'teljesAr'));
    }

}

