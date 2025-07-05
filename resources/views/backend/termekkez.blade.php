@extends('backend.layouts.base')

@section('content')
    @if(session('ujtermek') == 1)
        <div id="panel">
            <form action="{{ route('termek.ujfeltoltes') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{--Név--}}
                <label for="nev">*Termék neve:</label>
                <br>
                <input type="text" name="nev" id="nev" required/>
                <br>

                {{--ar--}}
                <label for="ar">*Ára:</label>
                <br>
                <input type="number" name="ar" id="ar" required/>
                <br>

                {{--mennyiseg--}}
                <label for="mennyiseg">*Mennyiség:</label>
                <br>
                <input type="number" name="mennyiseg" id="mennyiseg" required/>
                <br>

                {{--meret--}}
                <label for="meret">*Méret:</label>
                <br>
                <input type="hidden" name="meret" id="meret" value=""/>
                <button type="button" onclick="setMeret('S')">S</button>
                <button type="button" onclick="setMeret('M')">M</button>
                <button type="button" onclick="setMeret('L')">L</button>
                <button type="button" onclick="setMeret('XL')">XL</button>
                <button type="button" onclick="setMeret('XXL')">XXL</button>
                <br>
                <script>
                    function setMeret(selectedMeret) {
                        document.getElementById('meret').value = selectedMeret;
                    }
                </script>
                <br>

                {{--//kép feltöltés--}}
                <label for="fokep">*Válassza ki a termék fő képét:</label>
                <br>
                <input type="file" name="fokep" accept="image/*" required/>
                <br>

                {{--egérkép feltöltés--}}
                <label for="egerkep">*Válassza ki a termék 2. képét:</label>
                <br>
                <input type="file" name="egerkep" accept="image/*" required/>
                <br>

                {{--kep3--}}
                <label for="kep3">Válassza ki a termék 3. képét:</label>
                <br>
                <input type="file" name="kep3" accept="image/*"/>
                <br>

                {{--kep4--}}
                <label for="kep4">Válassza ki a termék 4. képét:</label>
                <br>
                <input type="file" name="kep4" accept="image/*"/>
                <br>

                {{--kep5--}}
                <label for="kep5">Válassza ki a termék 5. képét:</label>
                <br>
                <input type="file" name="kep5" accept="image/*"/>
                <br>

                <label for="leiras">*Termék leírása:</label>
                <br>
                <input type="text" name="leiras" id="leiras" required/>
                <br>

                <input class='termekek_neve' type="submit" value="Feltöltés">
            </form>
        </div>
    @endif
    @if(session('ujtermek') == 0)
        @if(!empty(session('termek_id')))
            <div id="panel">

                <form action='{{route('termek.feltoltes', ['id' => session('termek_id')])}}' method='post'
                      enctype='multipart/form-data'>
                    @csrf
                    {{--Név--}}
                    <label for="nev">Termék neve:</label>
                    <br>
                    <p>{{session('termek_nev')}}</p>
                    {{--ar--}}
                    <label for="ar">Ára:</label>
                    <br>
                    <input type="number" name="ar" id="ar"/>
                    <br>

                    {{--mennyiseg--}}
                    <label for="mennyiseg">Mennyiség:</label>
                    <br>
                    <input type="number" name="mennyiseg" id="mennyiseg"/>
                    <br>

                    {{--meret--}}
                    <label for="meret">*Méret:</label>
                    <br>
                    <input type="hidden" name="meret" id="meret" value=""/>
                    <button type="button" onclick="setMeret('S')">S</button>
                    <button type="button" onclick="setMeret('M')">M</button>
                    <button type="button" onclick="setMeret('L')">L</button>
                    <button type="button" onclick="setMeret('XL')">XL</button>
                    <button type="button" onclick="setMeret('XXL')">XXL</button>
                    <br>
                    <script>
                        function setMeret(selectedMeret) {
                            document.getElementById('meret').value = selectedMeret;
                        }
                    </script>
                    <br>

                    {{--//kép feltöltés--}}
                    <label for="fokep">Válassza ki a termék fő képét:</label>
                    <br>
                    <input type="file" name="fokep" accept="image/*"/>
                    <br>

                    {{--egérkép feltöltés--}}
                    <label for="egerkep">Válassza ki a termék 2. képét:</label>
                    <br>
                    <input type="file" name="egerkep" accept="image/*"/>
                    <br>

                    {{--kep3--}}
                    <label for="kep3">Válassza ki a termék 3. képét:</label>
                    <br>
                    <input type="file" name="kep3" accept="image/*"/>
                    <br>

                    {{--kep4--}}
                    <label for="kep4">Válassza ki a termék 4. képét:</label>
                    <br>
                    <input type="file" name="kep4" accept="image/*"/>
                    <br>

                    {{--kep5--}}
                    <label for="kep5">Válassza ki a termék 5. képét:</label>
                    <br>
                    <input type="file" name="kep5" accept="image/*"/>
                    <br>

                    <label for="leiras">Termék leírása:</label>
                    <br>
                    <input type="text" name="leiras" id="leiras"/>
                    <br>

                    <input class='termekek_neve' type="submit" value="Feltöltés">
                </form>

            </div>
        @endif

        <div id="termek_megjelenites">
            @foreach($termekek as $termek)
                @php
                    $imagePath = Storage::url($termek->mutatokep);
                    $egerimagePath = Storage::url($termek->egerkep);
                @endphp

                <div class="tallozas col-sm-6">
                    <div class='tallozas_termek'>
                        <p>Termék kép:</p>
                        <img class='termek_kep' src="{{ $imagePath }}" onmouseover="this.src='{{ $egerimagePath }}'"
                             onmouseout="this.src='{{ $imagePath }}'" alt="kep">
                    </div>
                    <div class='tallozas_termek'>
                        <p>Termék Neve:</p>
                        <p>{{$termek->nev}}</p>
                    </div>
                    <div class='tallozas_termek'>
                        <p>Termék Ára:</p>
                        <p>{{$termek->ar}} Ft</p>
                    </div>
                    <div class='tallozas_termek'>
                        <p>Termék Mennyisége:</p>
                        <p>{{$termek->mennyiseg}} db</p>
                    </div>
                    <div class='tallozas_termek'>
                        <p>Termék Mérete:</p>
                        <p>{{$termek->meret}}</p>
                    </div>
                    <form action='{{route('termek.modositas', ['id' => $termek->id])}}' class='tallozas_termek'
                          method='post'>
                        @csrf
                        <p>Új adatok hozzáadása:</p>
                        <input class='delete_gomb' type='submit' value='Hozzáadás'>
                    </form>
                    <form action='{{route('termek.torles', ['id' => $termek->id])}}' class='tallozas_termek'
                          method='post'>
                        @csrf
                        @method('DELETE')
                        <p>Termék Törlése:</p>
                        <input class='delete_gomb' type='submit' value='Törlés'>
                    </form>
                </div>
            @endforeach
        </div>
    @endif

@endsection
