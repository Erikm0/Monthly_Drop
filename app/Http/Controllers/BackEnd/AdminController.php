<?php

namespace app\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Termek;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $ujtermek = 1;
        $termekek = Termek::all();
        if(!$termekek->isEmpty())
            return view('backend.admin');
        elseif ($termekek->isEmpty())
            return redirect(route('termek.termekkez'))->with('ujtermek', $ujtermek);
    }

    public function termek(Request $request)
    {
        $termekek = Termek::all();

        $ujtermek = 0;

        if ($request->isMethod('post')) {
            if ($request->has('igen')) {
                $ujtermek = 1;
                return redirect(route('termek.termekkez'))->with('ujtermek', $ujtermek);
            }
            elseif ($request->has('nem')) {
                $ujtermek = 0;
                return redirect(route('termek.termekkez'))->with('ujtermek', $ujtermek);
            }
        }

        return view('backend.termekkez', ['termekek' => $termekek]);
    }
}
