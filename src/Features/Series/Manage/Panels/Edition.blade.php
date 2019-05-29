@extends('wave::layout.home')

@section('home.body')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-6 col-lg-6">
            @component('Form', ['model' => $model])
        </div>
    </div>
</div>
@endsection
