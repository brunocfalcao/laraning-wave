@extends('wave::layout.home')

@section('home.body')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            @twinkle('Datagrid', ['caption' => empty($caption) ? '' : $caption])
        </div>
    </div>
</div>
@endsection