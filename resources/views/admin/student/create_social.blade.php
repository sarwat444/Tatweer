<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="text" name="facebook" class="form-control ol-form-control" id="facebook"
               placeholder="{{ get_phrase('Facebook') }}"
               @isset($student->facebook) value="{{ $student->facebook }}" @endisset>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="text" name="twitter" class="form-control ol-form-control" id="twitter"
               placeholder="{{ get_phrase('Twitter') }}"
               @isset($student->twitter) value="{{ $student->twitter }}" @endisset>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-8 offset-sm-2">
        <input type="text" name="linkedin" class="form-control ol-form-control" id="linkedin"
               placeholder="{{ get_phrase('Linkedin') }}"
               @isset($student->linkedin) value="{{ $student->linkedin }}" @endisset>
    </div>
</div>
