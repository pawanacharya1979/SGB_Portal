<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;


use App\Http\Requests;
use DB;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $roleCount = \App\Role::count();
		if($roleCount != 0) {
			if($roleCount != 0) {
				return view('home');
			}
		} else {
			return view('errors.error', [
				'title' => 'Migration not completed',
				'message' => 'Please run command <code>php artisan db:seed</code> to generate required table data.',
			]);
		}
    }

    public function doLogin(Request $request)
    {
        
        //print_r($_POST);die();
        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:8'
        );

        // run the validation rules on the inputs from the form
        //$validator = Validator::make(Input::all(), $rules);
        $validator = \Validator::make($request->all(), [
            'email' => 'required', 'password' => 'required']);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('course-materials')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => Input::get('email') ,
                'password'  => Input::get('password'),
                'status'  => 'Active',
                'deleted_at'  => NULL
            );
            $email = Input::get('email');
            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                //echo 'SUCCESS!';
                //return Redirect::back();
                $rResult = DB::select( DB::raw("SELECT id 
													FROM users 
                                                    WHERE email = '".$email."'") );
                $user_id = $rResult[0]->id;
                $role = DB::select( DB::raw("SELECT role_id 
                                    FROM role_user 
                                    WHERE user_id = '".$user_id."'") );
                if(count($role) > 0){
                    if($role[0]->role_id == 1){
                        return Redirect::to('admin');
                    }else{
                        //return redirect()->route('/home');
                        return Redirect::back();
                    }

                }else{
                    //return redirect()->route('/home');
                    return Redirect::back();
                }                
                
                

            } else {        
                //exit('login failed');
                // validation not successful, send back to form 
                //return redirect()->route('/');
                return Redirect::back()->withErrors(['These credentials do not match our records.']);;

            }

        }
    }
}