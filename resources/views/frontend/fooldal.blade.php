@extends('frontend.layouts.base')

@section('content')
    @if($termekek->count() > 0)
        <div id="termek_tablazat">
            @php
            $a = 1
            @endphp
            @foreach($termekek as $nev => $csoport)
                @php
                    $elsoTermek = $csoport->first();
                    $imagePath = Storage::url($elsoTermek->mutatokep);
                    $imagePath_1 = Storage::url($elsoTermek->kep_1);
                    $imagePath_2 = Storage::url($elsoTermek->kep_2);
                    $imagePath_3 = Storage::url($elsoTermek->kep_3);
                    $egerimagePath = Storage::url($elsoTermek->egerkep);
                @endphp
                <div class="termekek">
                    <div class="adatok">
                        <div class='fooldal_termek_megjelenites'>
                            <div id="termek_kep_lehetosegek_megjel">
                                @if(!is_null($elsoTermek->kep_1))
                                    <img class='fooldal_termek_kep' id="" data-testid="{{ $imagePath_1 }}" onmouseover="this.src='{{ $egerimagePath }}'" onmouseout="this.src='{{ $imagePath_1 }}'" src="{{ $imagePath_1 }}" alt="kep">
                                @endif
                                @if(!is_null($elsoTermek->kep_2))
                                    <img class='fooldal_termek_kep' id="" data-testid="{{ $imagePath_2 }}" onmouseover="this.src='{{ $egerimagePath }}'" onmouseout="this.src='{{ $imagePath_2 }}'" src="{{ $imagePath_2 }}" alt="kep">
                                @endif
                                @if(!is_null($elsoTermek->kep_3))
                                    <img class='fooldal_termek_kep' id="" data-testid="{{ $imagePath_3 }}" onmouseover="this.src='{{ $egerimagePath }}'" onmouseout="this.src='{{ $imagePath_3 }}'" src="{{ $imagePath_3 }}" alt="kep">
                                @endif
                                <img class='fooldal_termek_kep' id="fokep" data-testid="{{ $imagePath }}" onmouseover="this.src='{{ $egerimagePath }}'" onmouseout="this.src='{{ $imagePath }}'"  src="{{ $imagePath }}" alt="kep">
                            </div>
                            <div id="termek_kep_lehetosegek">
                                <!--Amire ráviszed az egeret-->
                                <img class='termek_kep_opciok' width="100px" height="100px" data-testid="{{ $imagePath }}"  src="{{ $imagePath }}" alt="kep" onmouseover="showImage(this)">
                                @if(!is_null($elsoTermek->kep_1))
                                    <img class='termek_kep_opciok' width="100px" height="100px" data-testid="{{ $imagePath_1 }}"  src="{{ $imagePath_1 }}" alt="kep" onmouseover="showImage(this)">
                                @endif
                                @if(!is_null($elsoTermek->kep_2))
                                    <img class='termek_kep_opciok' width="100px" height="100px" data-testid="{{ $imagePath_2 }}"  src="{{ $imagePath_2 }}" alt="kep" onmouseover="showImage(this)">
                                @endif
                                @if(!is_null($elsoTermek->kep_3))
                                    <img class='termek_kep_opciok' width="100px" height="100px" data-testid="{{ $imagePath_3 }}"  src="{{ $imagePath_3 }}" alt="kep" onmouseover="showImage(this)">
                                @endif
                            </div>
                        </div>
                        <div id="termek_adatai">
                            <div class='termek_adatok'>
                                <p>{{ __('Products Name') }}:</p>
                                <p>{{ $elsoTermek->nev }}</p>
                            </div>
                            <div class='termek_adatok'>
                                <p>{{ __('Products Price') }}:</p>
                                <p>{{ $elsoTermek->ar }} Ft</p>
                            </div>
                            @guest()
                                <div class='termek_adatok'>
                                    <p>Termék Méret:</p>
                                    <div id="meretek">
                                        <input type="hidden" name="meret" id="meret_{{$a}}" class="meret" value=""/>
                                        @foreach($csoport as $termek)
                                            <button class="meretek_gomb" type="button" onclick="selectSize(this)" data-meret="{{$termek->meret}}">{{ $termek->meret }}</button>
                                        @endforeach
                                    </div>
                                </div>
                                <a class="vasarlas_gomb" href="{{route('login')}}">{{ __('Buy Now') }}</a>
                            @endguest
                            @auth()
                                <form method="post" action="{{ route('kosar.feltoltes', ['id' => $elsoTermek->id, 'user_id' => Auth::id()])}}">
                                    @csrf
                                    <div class='termek_adatok'>
                                        <p>Termék Méret:</p>
                                        <div id="meretek">
                                            <input type="hidden" name="meret" id="meret_{{$a}}" class="meret" value="" required/>
                                            @foreach($csoport as $termek)
                                                <button class="meretek_gomb" type="button" onclick="selectSize(this)" data-meret="{{$termek->meret}}">{{ $termek->meret }}</button>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="submit" class="vasarlas_gomb" name="kosarba" value="{{ __('Buy Now') }}"/>
                                </form>
                            @endauth
                        </div>
                    </div>
                    <div>
                        <p class='leiras'>{{ $elsoTermek->leiras }}</p>
                    </div>
                </div>
                @php
                    $a += 1
                @endphp
          @endforeach
    </div>
@endif
@endsection
