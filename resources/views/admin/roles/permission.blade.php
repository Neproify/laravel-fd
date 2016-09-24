<div class="form-group">
    <label for="{{ $name }}" class="col-md-4 control-label">{{ $label }}</label>
    <div class="col-md-6">
        <select class="form-control" id="{{ $name }}" name="{{ $name }}">
            <option value="0" @if($current == 0) selected @endif>Brak uprawnień</option>
            <option value="1" @if($current == 1) selected @endif>Podgląd</option>
            <option value="2" @if($current == 2) selected @endif>Edycja bez usuwania</option>
            <option value="3" @if($current == 3) selected @endif>Pełne uprawnienia</option>
        </select>
    </div>
</div>