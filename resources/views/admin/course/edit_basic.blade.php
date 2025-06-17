<input type="hidden" name="course_type" value="general" required>
<input type="hidden" name="instructors[]" value="{{ auth()->user()->id }}" required>


<div class="row mb-3">
    <label for="title" class="form-label ol-form-label col-sm-2 col-form-label">{{ get_phrase('Course title') }}<span
            class="text-danger ms-1">*</span></label>
    <div class="col-sm-10">
        <input type="text" name="title" value="{{ $course_details->title }}" class="form-control ol-form-control"
            id="title" required>
    </div>
</div>

<div class="row mb-3">
    <label for="short_description"
        class="form-label ol-form-label col-sm-2 col-form-label">{{ get_phrase('Short description') }}</label>
    <div class="col-sm-10">
        <textarea name="short_description" rows="3" class="form-control ol-form-control" id="short_description">{{ $course_details->short_description }}</textarea>
    </div>
</div>

<div class="row mb-3">
    <label for="description"
        class="form-label ol-form-label col-sm-2 col-form-label">{{ get_phrase('Description') }}</label>
    <div class="col-sm-10">
        <textarea name="description" rows="5" class="form-control ol-form-control text_editor" id="description">{!! removeScripts($course_details->description) !!}</textarea>
    </div>
</div>

<div class="row mb-3">
    <label class="form-label ol-form-label col-sm-2 col-form-label">{{ get_phrase('Category') }}<span
            class="text-danger ms-1">*</span></label>
    <div class="col-sm-10">
        <select class="ol-select2" name="category_id" data-minimum-results-for-search="Infinity" required>
            <option value="">{{ get_phrase('Select a category') }}</option>
            @foreach (App\Models\Category::where('parent_id', 0)->orderBy('title', 'desc')->get() as $category)
                <option value="{{ $category->id }}" @if ($course_details->category_id == $category->id) selected @endif>
                    {{ $category->title }}</option>

                @foreach ($category->childs as $sub_category)
                    <option value="{{ $sub_category->id }}" @if ($course_details->category_id == $sub_category->id) selected @endif> --
                        {{ $sub_category->title }}</option>
                @endforeach
            @endforeach
        </select>
    </div>
</div>
<div class="row mb-3 ">
    <label for="course_status" class="form-label ol-form-label col-sm-2 col-form-label">{{ get_phrase('Create as') }} <span
            class="text-danger ms-1">*</span></label>
    <div class="col-sm-10">
        <div class="eRadios">
            <div class="form-check">
                <input type="radio" value="active" name="status" class="form-check-input eRadioSuccess"
                    id="status_active" @if ($course_details->status == 'active') checked @endif required>
                <label for="status_active" class="form-check-label">{{ get_phrase('Active') }}</label>
            </div>
            <div class="form-check">
                <input type="radio" value="inactive" name="status" class="form-check-input eRadioDark"
                    id="status_inactive" @if ($course_details->status == 'inactive') checked @endif required>
                <label for="status_inactive" class="form-check-label">{{ get_phrase('Inactive') }}</label>
            </div>
        </div>
    </div>
</div>
