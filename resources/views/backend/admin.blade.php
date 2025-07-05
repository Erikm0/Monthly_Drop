@extends('backend.layouts.base')

@section('content')

    <div id="panel">
        <form id="form_valaszok" method="post" action="{{ route('admin.termek') }}">
            @csrf
            <h3><label> Új termék?</label></h3>
            <br>
            <input class="submit_gomb" type="submit" name="igen" value="Igen">
            <input class="submit_gomb" type="submit" name="nem" value="Nem">
        </form>
    </div>
@endsection
