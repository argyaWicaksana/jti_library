<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Builder\Use_;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('home.register',[
            'title' => 'Register'
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
           
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Student
     */
    protected function create(Request $request)
    {
       $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'nim' => ['required','string','max:20'],
                'profile_picture' => ['required'],
                'ktm_picture' => ['required'],
                'username' => ['required', 'string', 'max:20'],
                'password' => ['required', 'string', 'min:8'],
            ]);

       $input = $request->all();
       if($request->hasFile('ktm_picture') &&$request->hasFile('profile_picture') ){
            $destination_path_ktm = 'public/images/ktm';
            $destination_path_profile =  'public/images/profile';
            $ktm = $request->file('ktm_picture');
            $profile = $request->file('profile_picture');
            $ktm_name = $ktm->getClientOriginalName();
            $profile_name = $profile->getClientOriginalName();
            $path_ktm = $request->file('ktm_picture')->storeAs($destination_path_ktm,$ktm_name);
            $path_profile = $request->file('profile_picture')->storeAs($destination_path_profile,$profile_name);

            $input['ktm_picture'] = $ktm_name;
            $input['profile_picture'] = $profile_name;
        }
        $input['password']= Hash::make($input['password']);

        User::create($input);
        
        $request->session()->flash('success','Registration successfull! Please login');
        return redirect('/login');

        // if($request->hasFile('ktm_picture') ){
        //     $file = $request->file('ktm_picture');
        //     $name = time();
        //     $extension = $file->getClientOriginalExtension();
        //     $newName = $name.'.'.$extension;
           
        //     Storage::putFileAs('public',$request->file('ktm_picture'),$newName);

        //     $data= [
        //         'path' => 'storage/'.$newName,
         
        //     ];
           
        // }
        // if($request->hasFile('profile_picture')){
        //     $file1 = $request->file('profile_picture');
        //     $name1 = time();
        //     $extension1 = $file1->getClientOriginalExtension();
        //     $newName1 = $name1.'.'.$extension1;
     
        //     Storage::putFileAs('public',$request->file('profile_picture'),$newName1);

        //     $data1 = [
        //         'path' => 'storage/'.$newName1,
        //     ];
           
        // }
        // $validateData = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'nim' => ['required','string','max:20'],
        //     'profile_picture' => $data,
        //     'ktm_picture' => $data1,
        //     'username' => ['required', 'string', 'max:20'],
        //     'password' => ['required', 'string', 'min:8'],
        // ]);
        
        // $validateData['password']= Hash::make($validateData['password']);

        // User::create($validateData);
        
        // $request->session()->flash('success','Registration successfull! Please login');
        
        // return redirect('/login');

      
    }
}
