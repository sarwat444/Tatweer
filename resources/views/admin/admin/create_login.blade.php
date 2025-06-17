<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="email" name="email" class="form-control ol-form-control" id="email"
               placeholder="{{ get_phrase('Email') }} *"
               @isset($instructor->email) value="{{ $instructor->email }}" @endisset required>
    </div>
</div>

@if(!isset($instructor->email))
    <div class="row mb-3">
        <div class="col-sm-8 offset-sm-2">
            <input type="password" name="password" class="form-control ol-form-control" id="password"
                   placeholder="{{ get_phrase('Password') }} *">
        </div>
    </div>
@endif
