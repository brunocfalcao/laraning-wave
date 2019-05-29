@extends('library::Elements.Layouts.Forms.Standard')

@section('form.body')
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="hf-password">Type</label>
        <div class="col-md-9">
            @component('library::Elements.Forms.Inputs.DropdownList', ['data' => $videos, 'name' => 'id'])
            @error($errors, 'id')
        </div>
    </div>
@endsection

@section('card.title', 'Publish Video')

@action('index')
    @section('form.button.submit', 'Publish')
@endaction