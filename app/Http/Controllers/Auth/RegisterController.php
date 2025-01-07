<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'img' => ['nullable', 'mimes:jpg,jpeg,png', 'max:6048'], // 2MB max for the image file
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'student_id' => ['nullable', 'string', 'max:255'],
            'age' => ['nullable', 'integer'],
            'course' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $imagePath = null;
            if (isset($data['img'])) {
                // Access the image file from the data array (assuming the 'img' field is part of the form data)
                $imageFile = $data['img'];
                
                // Get the original file name without extension
                $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                
                // Create a new filename using the original name and a timestamp
                $fileName = $originalName . "_" . time() . '.' . $imageFile->getClientOriginalExtension();
                
                // Store the image in the 'public/upload/images' folder and get the path
                $imagePath = $imageFile->storeAs('public/upload/images', $fileName);
            }
    


        return User::create([
            'img' => $imagePath ? basename($imagePath) : null,
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'] ?? null,  // If middle_name is not provided, set it to null
            'last_name' => $data['last_name'],
            'role' => $data['role'] ?? 3,  // Default role is 3 if not provided
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'student_id' => $data['student_id'] ?? null,  // Set nullable fields to null if not provided
            'age' => $data['age'] ?? null,
            'course' => $data['course'] ?? null,
            'year' => $data['year'] ?? null,
            'address' => $data['address'] ?? null,
        ]);
    }
}
