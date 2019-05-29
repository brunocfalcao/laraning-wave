<select name="{{ $name }}" class="form-control form-control-sm">
    @foreach($data as $key => $item)
        <option value="{{ $key }}" {{ $key == optional($model)->$name ? 'selected' : '' }}>{{ $item }}</option>
    @endforeach
</select>
@error($errors, $name)
