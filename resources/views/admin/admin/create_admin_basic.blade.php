<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="text" name="name" class="form-control ol-form-control" id="user-name"
               placeholder="{{ get_phrase('Name') }}"
               @isset($instructor->name) value="{{ $instructor->name }}" @endisset required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <textarea name="about" rows="3" class="form-control ol-form-control" id="short_description"
                  placeholder="{{ get_phrase('Biography') }}">@isset($instructor->about){{ $instructor->about }}@endisset</textarea>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="text" name="phone" class="form-control ol-form-control" id="user-phone"
               placeholder="{{ get_phrase('Phone') }}"
               @isset($instructor->phone) value="{{ $instructor->phone }}" @endisset>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="text" name="address" class="form-control ol-form-control" id="user-address"
               placeholder="{{ get_phrase('Address') }}"
               @isset($instructor->address) value="{{ $instructor->address }}" @endisset>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="file" name="photo" class="form-control ol-form-control" id="photo">
        <small class="form-text text-muted">{{ get_phrase('User image') }}</small>
    </div>
</div>
