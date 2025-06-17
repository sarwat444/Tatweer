<?php

namespace App\Http\Controllers\student;

use App\Models\Course;
use App\Models\Enrollment;
use App\Http\Controllers\Controller;

class MyCoursesController extends Controller
{
    public function index()
    {

        $category_id = auth()->user()->category_id;
        if($category_id)
        {
            $page_data['my_courses'] = Course::where('status', 'active')
                                                ->where('category_id' , $category_id)
                                                ->paginate(6);

            $view_path = 'frontend.' . get_frontend_settings('theme') . '.student.my_courses.index';
            return view($view_path, $page_data);
        }
    }
}
