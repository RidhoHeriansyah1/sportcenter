<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Subscriber;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class CustomerAuthController extends Controller
{
    public function LoadLogin()
    {
        return view('frontend.auth.login');
    }

    public function LoadRegister()
    {
        return view('frontend.auth.register');
    }

    public function LoadReset()
    {
        return view('frontend.auth.reset');
    }

    public function CustomerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->withSuccess('Signed in');
        }else{
			return redirect()->back()->withFail(__('Your email address and password incorrect.'));
		}
    }

    public function CustomerRegister(Request $request)
    {
		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed|min:6',
		]);

		$data = array(
			'name' => $request->input('name'),
			'email' => $request->input('email'),
			'password' => Hash::make($request->input('password')),
			'bactive' => base64_encode($request->input('password')),
			'status_id' => 1,
			'role_id' => 3
		);

		$response = User::create($data);

		if($response){
			return redirect()->back()->withSuccess(__('Thanks! You have register successfully. Please login.'));
		}else{
			return redirect()->back()->withFail(__('Oops! You are failed registration. Please try again.'));
		}
    }

	//Save data for user
    protected function resetPassword(Request $request){
		$email = $request->input('email');

		$request->validate([
			'email' => 'required'
		]);

		//You can add validation login here
		$user = DB::table('users')->where('email', '=', $email)->get();
		$userCount = $user->count();

		//Check if the user exists
		if($userCount < 1) {
			return redirect()->back()->withFail( __('We can not find a user with that email address'));
		}

		//Create Password Reset Token
		DB::table('password_resets')->insert([
			'email' => $email,
			'token' => Str::random(60),
			'created_at' => Carbon::now()
		]);

		$tokenData = DB::table('password_resets')->where('email', $email)->first();

		$sendResetEmail = self::sendResetEmail($email, $tokenData->token);

		if ($sendResetEmail == 1) {
			return redirect()->back()->withSuccess(__('We have emailed your password reset link!'));
		} else {
			return redirect()->back()->withFail(__('Oops! You are failed change password request. Please try again'));
		}
	}

	public function sendResetEmail($email, $token){

		//Retrieve the user from the database
		$UserObj = User::where('email', $email)->first();
		$user = $UserObj->toArray();

		$base_url = url('/');

		// Fungsi Kirim EMail - Coming Soon
        return 1;
	}

	public function resetPasswordUpdate(Request $request){

		$email = $request->input('email');
		$password = $request->input('password');
		$token = $request->input('token');

		//Validate input
		$validator = $request->validate([
			'email' => 'required|email|exists:users,email',
			'password' => 'required|confirmed',
			'token' => 'required',
		]);

		//Validate the token
		$tokenData = DB::table('password_resets')->where('token', $token)->get();
		$tokenCount = $tokenData->count();

		//Check the token is invalid
		if($tokenCount == 0) {
			return redirect()->back()->withFail(__('This password reset token is invalid'));
		}

		//Validate the Email
		$EmailCount = DB::table('password_resets')->where('email', $email)->count();

		//Check the token is invalid
		if($EmailCount == 0) {
			return redirect()->back()->withFail(__('This password reset email is invalid'));
		}

		$tokenEmail = $tokenData[0]->email;
		$userCount = User::where('email', $tokenEmail)->count();

		//Redirect the user back if the email is invalid
		if ($userCount == 0){
			return redirect()->back()->withFail(__('We can not find a user with that email address'));
		}else{

			$data = array(
				'password' => Hash::make($password),
				'bactive' => base64_encode($password)
			);

			$response = User::where('email', $tokenEmail)->update($data);

			if($response){
				//Delete the token
				DB::table('password_resets')->where('email', $tokenEmail)->delete();

				return redirect()->back()->withSuccess(__('Your password changed successfully'));

			}else{
				return redirect()->back()->withFail(__('Oops! You are failed change password. Please try again'));
			}
		}
	}
}
