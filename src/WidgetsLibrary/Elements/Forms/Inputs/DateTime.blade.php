@php
    /*
        @component('library::Elements.Forms.Inputs.DateTime', ['model' => $model, 'field' => 'published_at']
     */
    $id = str_random(5);
@endphp
<div class="input-group date" id="{{ $id }}" data-target-input="nearest">
    <div class="input-group-append" data-target="#{{ $id }}" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
    </div>
    <input type="text" value="{{ old($field, optional($model)->$field) }}" name="{{ $field }}" class="form-control datetimepicker-input" data-target="#{{ $id }}"/>
</div>
@error($errors, $field)

@pushonce('scripts.additional')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
@endpushonce

@push('scripts.additional')
<script type="text/javascript">
    $(function () {
        $('#{{ $id }}').datetimepicker({format: 'YYYY-MM-DD HH:mm'});
    });
</script>
@endpush

@pushonce('css.additional')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endpushonce
