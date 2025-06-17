<div class="row mb-3">
    <div class="col-sm-10 offset-sm-1">
        <input type="email" name="email" class="form-control ol-form-control"
               placeholder="{{ get_phrase('Email') }} *"
               @isset($student->email) value="{{ $student->email }}" @endisset required>
    </div>
</div>

@if (!isset($student->email))
    <div class="row mb-3">
        <div class="col-sm-10 offset-sm-1">
            <input type="password" name="password" class="form-control ol-form-control"
                   placeholder="{{ get_phrase('Password') }} *">
        </div>
    </div>
@endif
