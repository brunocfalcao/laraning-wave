@extends('wave::layout.home')

@section('home.body')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            @twinkle('Form', ['videos' => $videos])
        </div>
    </div>
</div>
@endsection