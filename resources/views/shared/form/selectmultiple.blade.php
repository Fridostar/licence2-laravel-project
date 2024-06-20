@php
$value ??= '';
@endphp

<div class="form-group">
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <select id="{{$name}}" name="{{$name}}[]" class="@error($name) is-invalid @enderror" multiple>
        @foreach($outfits as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>