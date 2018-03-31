<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/user_list';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|min:1|max:1',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function index()
    {
        //return User::all();
        return view('auth/user_list')->with(array('posts'=>User::orderBy('name', 'asc')->paginate(5), 'action'=>''));
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }

    public function update(Request $request, $id)
    {
        User::find(self::decrypt($id, 'N'))->update($request->all());
        return self::index();
    }

    public function destroy($id)
    {
      User::find(self::decrypt($id, 'N'))->delete();
      return self::index();
    }

  	public function encrypt($string="", $filter=""){
  		$string = app(\App\Http\Controllers\EncryptDencryptController::class)->encrypt($string);
  		return ($filter == 'N')?preg_replace("/[^0-9]/", "", $string): $string;
  	}

  	public function decrypt($string="", $filter=""){
  		$string = app(\App\Http\Controllers\EncryptDencryptController::class)->decrypt($string);
  		return ($filter == 'N')?preg_replace("/[^0-9]/", "", $string): $string;
  	}

    protected function form($string)
    {
      $qry = User::where('id', self::decrypt($string, 'N'))->get();

      if(count($qry) > 0)
        return view('auth/user_form')->with(array('posts'=>$qry, 'action'=>explode(",",self::decrypt($string))[1]));
      else
        return view('auth/user_form');
    }
}
