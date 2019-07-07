@extends('wave::layout.home')

@section('home.body')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            @twinkle('library::Elements.Charts.CardSimple')
        </div>
    </div>
</div>
@endsection