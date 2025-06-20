<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use App\Models\FileUploader;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $input = $request->all();

        if (get_frontend_settings('recaptcha_status') == true && check_recaptcha($input['g-recaptcha-response']) == false) {

            Session::flash('error', get_phrase('Recaptcha verification failed'));

            return redirect(route('register.form'));
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits_between:7,15'],
            'address' => ['required', 'string', 'max:500'],
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'email' => ['required', 'string', 'email', 'unique:users,email'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (isset($request->photo) && $request->hasFile('photo')) {
            $path = "uploads/users/student/" . nice_file_name($request->name, $request->photo->extension());
            FileUploader::upload($request->photo, $path, 400, null, 200, 200);
            $data['photo'] = $path;
        }

        $user_data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'photo' =>$path,
            'role' => 'student',
            'status' => 1,
            'password' => Hash::make($request->password),
            'verified_student' => 0,
        ];

        if(get_settings('student_email_verification') != 1){
            $user_data['email_verified_at'] = Carbon::now();
        }

        $user = User::create($user_data);


        event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
