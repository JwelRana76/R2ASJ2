<div class="form-group mb-3">
    <label class="form-label" for="{{ $id }}">
        {{ ucwords($id) }}
        <strong>
            {{$attributes['required'] ? '*' : ''}}
        </strong>
    </label>

    <input 
        value="{{ $attributes['value'] ?? old($id) }}" 
        id="{{ $id }}" 
        class="form-control" 
        type="{{ $type }}"
        name="{{ $id }}" 
        {{ $attributes }}
    />

    @error($id)
        <strong class="text-danger">{{ $message }}</strong>
    @enderror
</div>