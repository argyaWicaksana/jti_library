<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
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
        $student = User::paginate(3);
        // $posts = Student::orderBy('id','asc')->paginate(3);
        return view('admin.student.index', compact('student'));
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $student = User::where('name', 'like', "%" . $keyword . "%")
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
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'nim' => ['required', 'string', 'max:20'],
        //     'profile_picture' => ['image'],
        //     'ktm_picture' => ['image'],
        //     'username' => ['required', 'string', 'max:20'],
        //     'password' => ['required', 'string', 'min:8'],
        // ]);
        // $input = $request->all();
        // if ($request->hasFile('ktm_picture') && $request->hasFile('profile_picture')) {
        //     $destination_path_ktm = 'images/ktm';
        //     $destination_path_profile =  'images/profil';
        //     $ktm = $request->file('ktm_picture');
        //     $profile = $request->file('profile_picture');
        //     $ktm_name = $ktm->getClientOriginalName();
        //     $profile_name = $profile->getClientOriginalName();
        //     $request->file('ktm_picture')->storeAs($destination_path_ktm, $ktm_name);
        //     $request->file('profile_picture')->storeAs($destination_path_profile, $profile_name);

        //     $input['ktm_picture'] = $ktm_name;
        //     $input['profile_picture'] = $profile_name;
        // }
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:20'],
            'profile_picture' => ['image'],
            'ktm_picture' => ['image'],
            'username' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8'],
        ];
        
        $data = $request->validate($rules);
        
        if($request->file('profile_picture') && $request->file('ktm_picture')){
            $data['profile_picture'] = $request->file('profile_picture')->store('images/profil');
            $data['ktm_picture'] = $request->file('ktm_picture')->store('images/ktm');
        }
        
        User::create($data);
        // $student = new Student();
        // $student->name = $request->get('name');
        // $student->nim = $request->get('nim');
        // $student->profile_picture = $profile;
        // $student->ktm_picture = $ktm;
        // $student->username = $request->get('username');
        // $student->password = $request->get('password');
        // $student->save();


        return redirect()->route('student.index')
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
        $Student = User::where('id', $id)->first();

        return view('admin.student.detail', ['Student' => $Student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Student = User::where('id', $id)->first();
        return view('admin.student.edit', compact('Student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        // $rules = [
        //     'name' => ['required', 'string', 'max:255'],
        //     'nim' => ['required', 'string', 'max:20'],
        //     'profile_picture' => ['image'],
        //     'ktm_picture' => ['image'],
        //     'username' => ['required', 'string', 'max:20'],
        //     'password' => ['required', 'string', 'min:8'],
        // ];
        
        // $data = $request->validate($rules);
        
        // if ($student->profile_picture && file_exists(storage_path('app/public/images/profil/' . $student->profile_picture))) {
        //     Storage::delete('public/images/profil/' . $student->profile_picture);
        // }
        
        // if($request->hasFile('ktm_picture') && $request->hasFile('profile_picture')){
        //     $ktm = $request->file('ktm_picture');
        //     $profile = $request->file('profile_picture');
        //     $ktm_name = $ktm->getClientOriginalName();
        //     $profile_name = $profile->getClientOriginalName();
        //     $data['profile_picture'] = $request->file('profile_picture')->storeAs('images/profil/', $profile_name);
        //     $data['ktm_picture'] = $request->file('ktm_picture')->storeAs('images/ktm/', $ktm_name);

        //     $data['ktm_picture'] = $ktm_name;
        //     $data['profile_picture'] = $profile_name;
        // }
        // Student::where('id', $student->id)
        // -> update($data);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:20'],
            'profile_picture' => ['image'],
            'ktm_picture' => ['image'],
            'username' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8'],
        ];
        
        $data = $request->validate($rules);
        
        
        if($request->file('profile_picture')){
            if($request->oldProfile){
                Storage::delete($request->oldProfile);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('images/profil');
        }
        if($request->file('ktm_picture')){
            if($request->oldKtm){
                Storage::delete($request->oldKtm);
            }
            $data['ktm_picture'] = $request->file('ktm_picture')->store('images/ktm');
        }
        User::where('id', $student->id)
        -> update($data);
        
        //if the data successfully updated, will return to main page
        return redirect()->route('student.index')
            ->with('success', 'Student Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);
        if ($student->profile_picture && file_exists(storage_path('app/public/' . $student->profile_picture))) {
            Storage::delete('public/' . $student->profile_picture);
        }

        $student->delete();
        return redirect()->route('student.index')
            ->with('success', 'Student Successfully Deleted');
    }

    public function print_student()
    {  
        //$student = User::where('id', $id)->first();
       
        $student = User::all();
        // $pdf = PDF::loadview('print.student_pdf', ['student'=> $student]);
        $pdf = PDF::loadview('print.student_pdf', ['student'=> $student]);
        return $pdf->stream('student.pdf');
    }
}
