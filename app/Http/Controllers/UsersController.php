<?php
    
    namespace App\Http\Controllers;
    
    use App\Product;
    use App\User;
    use HttpOz\Roles\Models\Role;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Storage;
    use Intervention\Image\Facades\Image;

    class UsersController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth');
        }
        
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            $users = User::with('roles')
                         ->get()
            ;

            
            return view('admin.users.users_index', compact('users'));
        }
        
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
            $roles = Role::pluck('name', 'id');
            $user_role = null;
            
            return view('admin.users.users_create', compact('roles', 'user_role'));
        }
        
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
            $this->validate($request, [
                'email' => 'required|unique:users',
                'img'=> 'mimes:jpeg,jpg,png'
            ]);
            
            
            if ($request->hasFile('img')){
                
                $path = 'img/avatars/'.str_random(10).'.png';
                Image::make($request->file('img'))->fit(300, 300)->save($path,50);
               
            }else{
                $path = null;
            }
            
            //$path = Storage::putFile('avatars', $request->file('avatar'));
            
            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'img'      => $path,
            ]);
            
            $user->attachRole($request->role);
	
	        Session::flash('mensaje','Usuario creado con exito');
            
            return redirect('admin/users');
            
        }
        
        /**
         * Display the specified resource.
         *
         * @param  int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
            $roles = Role::pluck('name', 'id');
            $user = User::with('roles')
                        ->whereId($id)
                        ->first()
            ;
            $user_role = $user->roles->first()->id;
            
            return view('admin.users.users_edit', compact('roles', 'user', 'user_role'));
        }
        
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int                      $id
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
            $this->validate($request, [
                'img'=> 'mimes:jpeg,jpg,png'
            ]);
            
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->hotel = implode($request->hotel,',');
            
            //se verifica si tiene imagen y se sube al storage
            if ($request->hasFile('img')) {
    
                $path = 'img/avatars/'.str_random(10).'.png';
                Image::make($request->file('img'))->fit(300, 300)->save($path,50);
                $user->img = $path;
            }
            
            //se verifica si cambiaron la contraseña y se actualiza de ser cierto
            if ($request->password == '') {
                $user->password = bcrypt($request->password);
            }
    
            $user->syncRoles([$request->role]);
            
            $user->save();
	
	        Session::flash('mensaje','Usuario actualizado con exito');
            
            return redirect('admin/users');
            
            
        }
        
        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
            $user = User::find($id);
            $user->delete();
            
            
        }
    }
