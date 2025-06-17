@php
    $categories  = App\Models\Category::all();
@endphp

<div class="row mb-3">
    <div class="col-sm-10 offset-sm-1">
        <input type="text" name="name" class="form-control ol-form-control" placeholder="{{ get_phrase('Name') }} *"
               @isset($student->name) value="{{ $student->name }}" @endisset required>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-10 offset-sm-1">
        <textarea name="about" rows="3" class="form-control ol-form-control" placeholder="{{ get_phrase('Biography') }}">@isset($student->about){{ $student->about }}@endisset</textarea>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-10 offset-sm-1">
        <input type="text" name="phone" class="form-control ol-form-control" placeholder="{{ get_phrase('Phone') }}"
               @isset($student->phone) value="{{ $student->phone }}" @endisset>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-10 offset-sm-1">
        <input type="text" name="address" class="form-control ol-form-control" placeholder="{{ get_phrase('Address') }}"
               @isset($student->address) value="{{ $student->address }}" @endisset>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-10 offset-sm-1">
        <select name="category_id" class="form-control ol-form-control">
            <option value="">{{ get_phrase('Grade') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @isset($student->category_id) @if($student->category_id == $category->id) selected @endif @endisset>
                    {{ $category->title }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-10 offset-sm-1">
        <input type="file" name="photo" class="form-control ol-form-control" placeholder="{{ get_phrase('User image') }}">
    </div>
</div>
