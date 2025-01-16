<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentsInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRole = auth()->user()->role; // Get the current logged-in user's role

        // Fetch students where the role is 3 (students)
        $students = User::where('role', 3)->get(); 
        return view('admin.students-information.index', compact('students', 'userRole'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userRole = auth()->user()->role; // Get the current logged-in user's role

        // Find the student by ID
        $student = User::findOrFail($id);

        // Return the view with student data
        return view('admin.students-information.show', compact('student', 'userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the user (student)
        $user = User::findOrFail($id);

        // Validate incoming request
        $validated = $request->validate([
            'img' => 'nullable|file|max:9024|mimes:jpeg,png',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'student_id' => 'nullable|unique:users,student_id,' . $user->id,
            'age' => 'nullable|integer',
            'course' => 'nullable|string',
            'year' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        // Update general information
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        // Handle file upload if present
        if ($request->hasFile('img')) {
            $imageFile = $request->file('img');
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . "_" . time() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('public/upload/images', $fileName);
            $user->img = $fileName; // Save the image filename
        }

        // Update student-specific fields if provided
        $user->student_id = $request->student_id ?? $user->student_id;
        $user->age = $request->age ?? $user->age;
        $user->course = $request->course ?? $user->course;
        $user->year = $request->year ?? $user->year;
        $user->address = $request->address ?? $user->address;

        // Save the user data
        $user->save();

        // Return a response
        return view('admin.dashboard')->with('success', 'User updated successfully!');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
