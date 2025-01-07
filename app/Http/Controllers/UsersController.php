<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently logged-in user
        $currentUser = auth()->user();

        // Get all users except the currently logged-in user
        $users = User::where('id', '!=', $currentUser->id)->get(); 

        // Return the view with the updated users list
        return view('admin.users.index', compact('users'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(); 
        return view('admin.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'img' => 'required|file|max:9024|mimes:jpeg,png',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'student_id' => 'nullable|unique:users,student_id', 
            'age' => 'nullable|integer',
            'course' => 'nullable|string',
            'year' => 'nullable|string',
            'address' => 'nullable|string',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        
        if ($request->hasFile('img')) {
            $imageFile = $request->file('img');
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . "_" . time() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('public/upload/images', $fileName);
            $user->img = $fileName; 
        }


        if ($request->role == 3) {
            $user->student_id = $request->student_id;
            $user->age = $request->age;
            $user->course = $request->course;
            $user->year = $request->year;
            $user->address = $request->address;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id); 
        if (!$user) {
            return redirect()->route('admin.students.index')->with('error', 'Student not found.');
        }
    
        return view('admin.users.show', compact('user'));
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
       
        $user = User::findOrFail($id);
    
       
        $validated = $request->validate([
            '*img' => 'required|file|max:9024|mimes:jpeg,png',
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, 
            'student_id' => 'nullable|unique:users,student_id,' . $user->id,             
            'age' => 'nullable|integer',
            'course' => 'nullable|string',
            'year' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
    
       
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->hasFile('img')) {
            $imageFile = $request->file('img');
            $originalName = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
            $fileName = $originalName . "_" . time() . '.' . $imageFile->getClientOriginalExtension();
            $path = $imageFile->storeAs('public/upload/images', $fileName);
            $user->img = $fileName;
        }
    

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); 
        }
    
        
        if ($request->role == 3) {
            $user->student_id = $request->student_id;
            $user->age = $request->age;
            $user->course = $request->course;
            $user->year = $request->year;
            $user->address = $request->address;
        } else {
            
            $user->student_id = null;
            $user->age = null;
            $user->course = null;
            $user->year = null;
            $user->address = null;
        }
    
        
        $user->save();
    
        
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id); 
    //     $user->delete(); 

    //     return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    // }

    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);
        $userName = $deleteUser->first_name;
        $deleteUser->destroy($id);
        
        if($deleteUser){
            return response()->json(['message' => $userName .' deleted successfully']);
        } else {
            return response()->json(['error' => 'Deletion failed!']);
        }
    }


    public function list()
    {
        $users = User::all();

        return response()->json($users);
    }


}
