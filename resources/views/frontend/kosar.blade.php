@extends('frontend.layouts.base')

@section('content')
    <div class="kosar">
        <h2 id="kosarCim">Kosár</h2>
        <div id="kosar_tartalom">
            <div id="kosar_termekek">
                @foreach($kosarElemek as $kosarElem)
                    @php
                        $imagePath = Storage::url($kosarElem->termek->mutatokep);
                        $egerimagePath = Storage::url($kosarElem->termek->egerkep);
                    @endphp
                    <div class="termekek-kosar">
                        <div class='termek_megjelenites'>
                            <img class='termek_kep' src="{{ $imagePath }}" onmouseover="this.src='{{ $egerimagePath }}'"
                                 onmouseout="this.src='{{ $imagePath }}'" alt="kep">
                        </div>
                        <div class="kosar_termek_adatok">
                            <div class="kosar_adatok">
                                <p class="termekekSzoveg">{{ __('Products Name') }}:</p>
                                <p class="termekekSzoveg">{{ $kosarElem->termek->nev }}</p>
                            </div>
                            <div class="kosar_adatok">
                                <p class="termekekSzoveg">{{ __('Products Amount') }}:</p>
                                <p class="termekekSzoveg">{{$kosarElem->mennyiseg}}db</p>
                            </div>
                            <div class="kosar_adatok">
                                <p class="termekekSzoveg">{{ __('Products Size') }}:</p>
                                <p class="termekekSzoveg">{{$kosarElem->meret}}</p>
                            </div>
                            <div class="kosar_adatok">
                                <p class="termekekSzoveg">{{ __('Products Price') }}:</p>
                                <p class="termekekSzoveg"> {{ $kosarElem->termek->ar * $kosarElem->mennyiseg}}Ft</p>
                            </div>
                            <br>
                            <form method="post"
                                  action="{{ route('kosar.torles', ['id' => $kosarElem->termek->id, 'user_id' => Auth::id()])}}">
                                @csrf
                                <input type="submit" class="termekek_neve" name="kosarba" value="{{ __('Delete') }}"/>
                            </form>
                        </div>
                    </div>

                    @php
                        $teljesAr += $kosarElem->termek->ar * $kosarElem->mennyiseg;
                    @endphp
                @endforeach
            </div>
            <div id="kosar_vasarlas">
                <p id="kosarAra">Összesen: {{ $teljesAr }} Ft</p>
            </div>
        </div>

    </div>
@endsection
