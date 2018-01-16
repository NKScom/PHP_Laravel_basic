<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use TCG\Voyager\Models\User;

use TCG\Voyager\Facades\Voyager;

use Mail, DB;

use Carbon\Carbon;

class AuthController extends Controller
{

	use AuthenticatesUsers;

    public function login(){
    	return view('site.auth.login');
    }

    /**
     *
     * Login Controller
     *
     * @var email, password
     * 
     * 
     */

    public function postlogin(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function redirectPath()
    {
        return route('home');
    }

    /**
   	*
   	*	Logout controller
   	* 
    */

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }


    public function register()
    {
    	return view('site.auth.register');
    }

    /**
     *
     * Register controller
     *
     * @var email, username, password, confirm password
     * 
     */
    
    public function postregister(Request $request){
    	
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user['name'] = $request->name;

        $user['email'] = $request->email;

        $user['password'] = bcrypt($request->password);

        $user['role_id'] = Voyager::model('Role')->firstOrCreate(['name' => 'normal user'],['display_name' => 'User'])->id;

        $regist = User::create($user);

        if($regist){

            Mail::send('email.welcome-mail', [ 'email' => $request->email ], function($message) use ($request)
                    {
                        $message->to($request->email);

                        $message->subject('Welcome To NKS');
                    });

            Auth::login($regist,true);

            return redirect('/');

        }

    }

    public function forgotpass(){

        return view('site.auth.password.email');

    }

    public function postforgotpass(Request $request){

        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $user = User::whereEmail($request->email)->first();

        if(count($user)==0)

            return redirect()->back()->with([
                'error' => 'Your email don\'t exists.'
            ]);

        $token = csrf_token();

        if(DB::table('password_resets')->where('email', $user->email)->first()){

            $reminder = DB::table('password_resets')->where('email', $user->email)->first();

        }else{

            DB::table('password_resets')->insert(['email' => $user->email, 'token' => $token, 'created_at' => Carbon::now()]);

            $reminder = DB::table('password_resets')->where('email', $user->email)->first();

        }

        $this->sendEmail($user, $reminder->token);

        return redirect()->back()->with([
                'status' => 'Reset code was send to your email.'
            ]);
    }

    private function sendEmail($user, $code){
        Mail::send('email.forgot-mail',[
                'email' =>$user->email,
                'token' =>$code
            ], function($message) use ($user){
                $message->to($user->email);

                $message->subject('Reset your password');
            });
    }

    public function resetpassword($token){

        $email = Input::get('email');

        $check = DB::table('password_resets')->where('email', $email)->where('token',$token)->where('created_at','>' , Carbon::now()->subHours(2))->first();

        if(isset($check)){

            return view('site.auth.password.reset',compact('email','token'));

        }
        else{

            $check = DB::table('password_resets')->where('email', $email)->where('token',$token)->delete();
              
            return redirect('/');

        }

    }

    public function postresetpassword(Request $request){

        $this->validate($request, [

            'password' => 'required|min:6|confirmed'

        ]);

        $data['password'] = bcrypt($request->password);

        User::where('email', $request->email)->update($data);

        DB::table('password_resets')->where('email', $request->email)->where('token',$request->token)->delete();

        return redirect('login')->with(['status' => 'Your password has been reset.']);    
    }
    
}
