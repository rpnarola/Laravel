<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
//use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Auth;
use \Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\DB;
use App\User;

/**
 * Description of UsersController
 *
 * @author 
 */
class UsersController extends Controller
{
    /**  function __construct()
      {
      $this->middleware('authadmin');
      } */

    /**
     * Mathod call By default
     * 
     * @return form View Page
     */
    public function index()
    {
        echo Hash::make('rahul');
        return view('admin/login');
    }

    /**
     * login User
     * @return view
     */
    public function login()
    {
        $username = Input::get('username');
            $password = Input::get('password');
        $users = new User();
//        echo Hash::make('rahul');
//        exit;
        $validator = Validator::make(Input::all(), $users::$rules);
        if ($validator->passes())
        {

            $user = User::where('email', '=', $username)->first();
            if ($user != null)
            {
                $hash = $user->password;
                if (password_verify($password, $hash))
                {
                    Auth::login($user);
                    if (Auth::check())
                    {
                        //$user = new User();
                        //($user->getTable());
                        //dd(Auth::user()->name);
                        //dd('login');
                            Session::put('usernm', Auth::user()->name);
                        //    $value=Session::get('usernm');
                        //dd($value);
                        
                        return Redirect::to('admin/dashboard');
                    }
                }
                else
                {
                    return Redirect::to('admin')->with('message', 'Your  password is wrong');
                }
            }
            else
            {
                return Redirect::to('admin')->with('message', 'Your Username and password are wrong');
            }
        }
        
        return Redirect::to('admin')->withErrors($validator)->withInput();
    }

    /**
     * Logout User
     */
    public function logout()
    {
        Session::forget('usernm');
        Auth::logout();
        return Redirect::to('admin');
    }
    
    public function users_list(){
        $searchterm = Input::get('searchterm');
        if ($searchterm)
        {
            Session::put('search', $searchterm);
            $users = DB::table('users')
                    ->where('users.name', 'LIKE', '%' . $searchterm . '%')
                    ->orWhere('users.email', 'LIKE', '%' . $searchterm . '%')
                    ->orderBy('users.id', 'DESC')
                    ->select('users.*')
                    ->paginate(5);
            //$projects = Projects::where('name', 'LIKE', '%' . $searchterm . '%')->orWhere('web_link', 'LIKE', '%' . $searchterm . '%')->orWhere('technology', 'LIKE', '%' . $searchterm . '%')->orWhere('features', 'LIKE', '%' . $searchterm . '%')->where('is_deleted', '=', 0)->orderBy('id', 'DESC')->paginate(3);
        }
        else
        {
            $value = Session::forget('search');
            $users = DB::table('users')
                            ->select('users.*')
                            ->where('users.user_role', 0)
                            ->orderBy('users.id', 'DESC')->paginate(5);
            //$projects = Projects::where('is_deleted', '=', 0)->orderBy('id','DESC')->paginate(3);
        }

        return view('admin/users')->with('users', $users);
    }
    public function adduser(){
        return view('admin/add_user');
    }
    public function store(Request $request){
        $user = new User();
        $validator = Validator::make(Input::all(), $user::$create);
        if ($validator->passes())
        {
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('email'));
            $user->save();
            return redirect('admin/users')
                        ->with('message','User created successfully');
        }
        return Redirect::to('admin/adduser')->withErrors($validator)->withInput();
        
        
    }
    
    public function destroy($id)
    {

        $users = User::find($id);
        if ($users)
        {
            $users->delete();
            return Redirect::to('admin/users')->with('message','User deleted successfully');
        }

        return Redirect::to('admin/users');
    }
    
    public function edit($id){
        $user = User::find($id);
        return view('admin/add_user')->with('user',$user);
    }
    
    public function update($id){
        $user = new User();
        $validator = Validator::make(Input::all(), $user::$edit);
        if ($validator->passes())
        {
            
            $user = User::find($id);
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $password = Input::get('password');
            if($password != ''){
                $user->password = Hash::make($password);
            }
            $user->save();
            return redirect('admin/users')
                        ->with('message','User updated successfully');
        }
        return Redirect::to('admin/users/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
    }
}
