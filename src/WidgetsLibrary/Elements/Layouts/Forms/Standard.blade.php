@extends('library::Elements.Layouts.Cards.Standard')

@php
    // Obtain information about the route in order to compute the <form> tag.
    $route = Route::current();
    $routeCollection = collect(explode('.', Route::current()->getName()));
    $action = Route::current()->getActionMethod();
    $nextAction = get_uri_collection_without_bindings()->last() == 'create' ? 'store' : 'update';

    if($action == 'edit')
        list($model, $key) = [collect($route->parameters())->first(), collect($route->parameters())->first()->getRouteKeyName()];

    // Compute next route.
    $routeCollection->pop();
    $routeCollection->push($nextAction);
@endphp

@section('card.title')
    @yield('form.title', ucfirst($action) . ' ' . str_singular(ucfirst($routeCollection[$routeCollection->count()-2])))
@endsection

@section('card.body')
        @switch($action)
            @case('create')
                <form action="{{ route($routeCollection->implode('.')) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @break;

            @case('edit')
                <form action="{{ route($routeCollection->implode('.'), [$model]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @break;
        @endswitch
            @csrf
            @yield('form.body')
@endsection

@section('card.footer')
    <button type="submit" class="btn btn-md btn-primary"><i class="fa fa-arrow-circle-o-right"></i> @yield('form.button.submit', 'Submit')</button>
    <button type="reset" class="btn btn-link text-primary">Reset</button>
@endsection

@pushonce('scripts.additional')
<script type="text/javascript">
    $(function(){
        var form  = $("form");
        var firstInput = $(":input:not(input[type=button],input[type=submit],button):visible:first", form);
        firstInput.focus();
      });
</script>
@endpushonce