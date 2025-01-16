<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        $teachers = Teacher::all();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::where('role',3)->get();
        return view('admin.teachers.create')->with('students',$students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'student_id' => 'required',
            'subjects' => 'required|nullable|string',
        ]);
    
        // Create a new Teacher record
        $teacher = new Teacher();
        $teacher->student_id = $request->student_id;
        $teacher->subjects = $request->subjects;
        $teacher->save(); // Save the teacher data to the teachers table
    
        // Now, also update the corresponding user's subjects field
        $user = User::where('student_id', $request->student_id)->first();
        if ($user) {
            // You can either append the new subject to the existing ones or just overwrite
            $existingSubjects = $user->subjects;
            if ($existingSubjects) {
                $user->subjects = $existingSubjects . ', ' . $request->subjects;
            } else {
                $user->subjects = $request->subjects;
            }
            $user->save(); // Save the updated subjects in the users table
        }
    
        // Redirect back to the teacher index page
        return redirect()->route('teachers.index')->with('success', 'Subject created and updated for the student!');
    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the teacher by ID
        $teacher = Teacher::findOrFail($id);
        $students = User::where('role', 3)->get(); // Get students with role 3

        return view('admin.teachers.edit', compact('teacher', 'students'));
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
        // Validate incoming data
        $validated = $request->validate([
            'student_id' => 'required',
            'subjects' => 'required|nullable|string',
        ]);
    
        // Find the existing teacher
        $teacher = Teacher::findOrFail($id);
    
        // Update teacher's information
        $teacher->student_id = $request->student_id;
        $teacher->subjects = $request->subjects;
        $teacher->save(); 
    
        // Now update the user (student) info if necessary
        $user = User::where('student_id', $request->student_id)->first();
        if ($user) {
            $user->subjects = $request->subjects; // Update subjects in users table
            $user->save();
        }
    
        return redirect()->route('teachers.index')->with('success', 'Subject updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the teacher by ID
        $deleteSubject = Teacher::findOrFail($id);

        // Find the user based on the student_id (from the Teacher record)
        $user = User::where('student_id', $deleteSubject->student_id)->first();

        // If user exists and has subjects
        if ($user && $user->subjects) {
            // Get the current subjects of the user
            $subjects = explode(', ', $user->subjects);  // Assuming subjects are comma-separated

            // Remove the subject associated with the teacher (the subject to delete is from the teacher record)
            $updatedSubjects = array_diff($subjects, [$deleteSubject->subjects]);

            // Reassign the updated subjects list back to the user (only if it's different)
            if (!empty($updatedSubjects)) {
                $user->subjects = implode(', ', $updatedSubjects); // Update the subjects field
            } else {
                // If no subjects remain, set it to null or an empty string
                $user->subjects = null;
            }

            // Save the updated user
            $user->save();
        }

        // Now delete the teacher record
        $deleteSubject->delete();

        // Return a success response
        return response()->json(['message' => 'Teacher and associated subject deleted successfully']);
    }

    
}
