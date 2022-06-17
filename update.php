$student = Student::find($id);
        $student->name = $request->input('name');
        $student->nim = $request->input('nim');
        $student->username = $request->input('username');
        $student->password = $request->input('password');
        
        if ($request->hasFile('ktm_picture') && $request->hasFile('profile_picture')) {
            $destination_path_ktm = 'images/ktm/'.$student->ktm_picture;
            $destination_path_profile =  'images/profil/'.$student->profile_picture;
            if(File::exists($destination_path_ktm&&$destination_path_profile)){
                File::delete($destination_path_ktm && $destination_path_profile);
            }
            
            $profile = $request->file('profile_picture');
            $ktm = $request->file('ktm_picture');
            $ktm_extention = $ktm->getClientOriginalExtention();
            $profile_extention = $profile->getClientOriginalExtention();
            $ktm_name = time().'.'.$ktm_extention;
            $profile_name = time().'.'.$profile_extention;
            $profile->move('images/profil/', $profile_name);
            $ktm->move('images/ktm/', $ktm_name);
            $student->profile_picture = $profile_name;
            $student->ktm_picture = $ktm_name;
        }
        
        $student->update();


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:20'],
            'profile_picture' => ['image'],
            'ktm_picture' => ['image'],
            'username' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $input = $request->all();
        
        if ($request->hasFile('ktm_picture') && $request->hasFile('profile_picture')) {
            $destination_path_ktm = 'images/ktm/';
            $destination_path_profile =  'images/profil/';
            $ktm = $request->file('ktm_picture');
            $profile = $request->file('profile_picture');
            $ktm_name = $ktm->getClientOriginalName();
            $profile_name = $profile->getClientOriginalName();
            $request->file('ktm_picture')->storeAs($destination_path_ktm, $ktm_name);
            $request->file('profile_picture')->storeAs($destination_path_profile, $profile_name);

            $data['ktm_picture'] = $ktm_name;
            $data['profile_picture'] = $profile_name;
        }
        
        Student::where('id', $student->id)
        -> update($data);

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
            $data['profile_picture'] = $request->file('profile_picture')->store('images/profil/');
        }
        Student::where('id', $student->id)
        -> update($data);