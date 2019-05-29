@extends('library::Elements.Layouts.Forms.Standard')

@section('form.body')
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="hf-email">Title</label>
        <div class="col-md-9">
            <input name="title" class="form-control" placeholder="Series title" value="{{ old('title', optional($model)->title) }}">
            @error($errors, 'title')
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="hf-password">Short Description</label>
        <div class="col-md-9">
            @component('library::Elements.Editors.Froala', ['field_name' => 'description_short', 'content' => old('description_short', optional($model)->description_short)])
            @error($errors, 'description_short')
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="hf-password">Long Description</label>
        <div class="col-md-9">
            @component('library::Elements.Editors.Froala', ['field_name' => 'description_long', 'content' => old('description_long', optional($model)->description_long)])
            @error($errors, 'description_long')
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="hf-password">Type</label>
        <div class="col-md-9">
            @component('library::Elements.Forms.Inputs.DropdownList', ['data' => ['sequenced' => 'Course', 'non sequenced' => 'Series'], 'name' => 'series_type'])
            @error($errors, 'series_type')
        </div>
    </div>
    @action('edit')
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="hf-password">Current image</label>
        <div class="col-md-9">
            <img style="max-width: 100%" src="{{ image(old('image_path', $model->image_path), 'wave') }}" alt="No image found">
        </div>
    </div>
    @endaction
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="image_path">Main Image</label>
        <div class="col-md-9">
            <input name="image_path" type="file" class="form-control" placeholder="Upload image">
            @error($errors, 'image_path')
            <p class="help-block"><small class="text-primary">Image dimensions: 1280px x 720px (exact).</small></p>
        </div>
    </div>
@endsection

@action('create')
    @section('form.button.submit', 'Create')
@endaction

@action('edit')
    @section('form.button.submit', 'Save')
@endaction