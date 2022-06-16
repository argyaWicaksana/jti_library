<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use DB;
use App\Models\CourseStudentModel;
use Illuminate\Support\Facades\Storage;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::paginate(3);
        // $posts = Student::orderBy('id','asc')->paginate(3);
        return view('dashboard.admin.student', compact('student'));
        
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $student = Student::where('name', 'like', "%" . $keyword . "%")
        ->orWhere('nim', 'like', "%" . $keyword . "%")
        ->orWhere('username', 'like', "%" . $keyword . "%")
        ->paginate(3);
        return view('student.search', compact('student'))
            ->with('i', (request()->input('page', 1) - 1) * 3);
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
        $request->validate([
            'Name'=>'required',
            'Nim'=>'required',
            'Profile_picture'=>'required',
            'Ktm_picture'=>'required',
            'Username'=>'required',
            'Password'=>'required',
        ]);
        if ($request->file('profile_picture')) {
            $picture_name = $request->file('profile_picture')->store('profile_picture', 'public');
        }
        if ($request->file('ktm_picture')) {
            $ktmpicture_name = $request->file('ktm_picture')->store('ktm_picture', 'public');
        }

        $student = new Student;
        $student->name = $request->get('Name');
        $student->nim = $request->get('Nim');
        $student->profile_picture = $picture_name;
        $student->ktm_picture = $ktmpicture_name;
        $student->username = $request->get('Username');
        $student->password = $request->get('Password');

        return redirect()->route('dashboard.admin.student')
            ->with('success', 'Student succesfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Student = Student::with('class')->where('id', $id)->first();

        return view('student.detail',['Student' => $Student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Student = Student::with('class')->where('id',$id)->first();
        return view('student.edit',compact('Student'));
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
        $request->validate([
            'Name'=>'required',
            'Nim'=>'required',
            'Profile_picture'=>'required',
            'Ktm_picture'=>'required',
            'Username'=>'required',
            'Password'=>'required',
        ]);

        $student = Student::with('class')->where('id',$id)->first();

        if ($student->profile_picture && file_exists(storage_path('app/public/' . $student->profile_picture))) {
            Storage::delete('public/' . $student->profile_picture);
        }

        if ($request->file('profile_picture')) {
            $picture_name = $request->file('profile_picture')->store('profile_picture', 'public');
        }

        if ($student->ktm_picture && file_exists(storage_path('app/public/' . $student->ktm_picture))) {
            Storage::delete('public/' . $student->ktm_picture);
        }

        if ($request->file('ktm_picture')) {
            $ktmpicture_name = $request->file('ktm_picture')->store('ktm_picture', 'public');
        }

        $student->name = $request->get('Name');
        $student->nim = $request->get('Nim');
        $student->profile_picture = $picture_name;
        $student->ktm_picture = $ktmpicture_name;
        $student->username = $request->get('Username');
        $student->password = $request->get('Password');

        //if the data successfully updated, will return to main page
        return redirect()->route('dashboard.admin.student')
        ->with('success','Student Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student->profile_picture && file_exists(storage_path('app/public/' . $student->profile_picture))) {
            Storage::delete('public/' . $student->profile_picture);
        }

        $student->delete();
        return redirect()->route('dashboard.admin.student')
        ->with('success','Student Successfully Deleted');
    }

    public function print_student($id)
    {
        $student = Student::findOrFail($id);

        $pdf = PDF::loadview('student.print_student', ['student' => $student]);
        return $pdf->stream();
    }
}
