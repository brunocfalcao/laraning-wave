@extends('library::Elements.Layouts.Datagrids.Standard')
@inject('inspiring', 'Illuminate\Foundation\Inspiring')

@action('store')
    @section('datagrid.footer')
        <div class="alert alert-success" role="alert">
        Video <strong>{{ $caption }}</strong> successfully created!
        </div>
    @endsection
@endaction

@action('update')
    @section('datagrid.footer')
        <div class="alert alert-success" role="alert">
        Video <strong>{{ $caption }}</strong> successfully updated!
        </div>
    @endsection
@endaction

@action('index')
    @section('datagrid.footer')
    <small class='float-right'>{{ $inspiring::quote() }}</small>
    @endsection
@endaction