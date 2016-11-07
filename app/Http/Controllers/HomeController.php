<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Post;
use App\User;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured = Post::where('score', '=', '5')->take(8)->orderBy('id')->get();
        $phones = Phone::all();
        return view('site.home', [
            'featured' => $featured,
            'phones' => $phones
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function win($title, $id)
    {
        $phone = Phone::where('id', '=', $id)->first();
        $post = Post::where([
            ['deleted', '=', 0],
            ['score', '>', 0]
        ])->orderBy(DB::raw('RAND()'))->first();
        return view('site.win', [
            'phone' => $phone,
            'post' => $post
        ]);
    }

    public function normalizeUsername($email)
    {
        $username = '';
        if (!empty($email)) {
            $parts = explode("@", $email);
            $uuesername = $parts[0];
            $username = str_replace('.', '', $uuesername);
            $username = str_replace('-', '', $username);
            $username = str_replace('_', '', $username);
            $username = str_replace('+', '', $username);
            $username = str_replace("'", '', $username);
            $username = str_replace("/", '', $username);
            $username = str_replace(" ", '', $username);
            $username = str_replace("@", '', $username);
            $username = str_replace("!", '', $username);
            $username = str_replace("'", '', $username);
            $username = str_replace("!", '', $username);
            $username = str_replace("@", '', $username);
            $username = str_replace("#", '', $username);
            $username = str_replace("$", '', $username);
            $username = str_replace("%", '', $username);
            $username = str_replace("^", '', $username);
            $username = str_replace("&", '', $username);
            $username = str_replace("*", '', $username);
            $username = str_replace("{", '', $username);
            $username = str_replace("}", '', $username);
            $username = str_replace("(", '', $username);
            $username = str_replace(")", '', $username);
        }
        if (empty($username)) {
            $username = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5) . substr(uniqid(rand(), true), 0, 6);
        }

        return $username;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup()
    {
        $username = $this->normalizeUsername($_POST['data']['email']);
        $data = [
            'email' => $_POST['data']['email'],
            'username' => $username,
            'name' => $_POST['data']['name'],
            'password_hash' => sha1($_POST['data']['id']),
            'gender' => strtolower($_POST['data']['gender']) == 'male' ? 1 : 2,
            'scId' => $_POST['data']['id'],
            'accessToken' => $_POST['_token']
        ];
        $user = User::where('email', '=', $data['email'])->first();

        if (!$user) {
            $rules = array(
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'username' => 'required|unique:users|alpha_dash',
                'password_hash' => 'required|min:3|confirmed',
            );
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return Response::json(array('success' => false, 'id' => ''), 200);
            }
            $user = User::create($data);
        } else {
            $user->accessToken = $_POST['_token'];
            $user->save();
        }
        $userdata = array(
            'email' => $user->email,
            'password' => $user->password
        );
        Auth::login($user, 1);
        echo json_encode(['success' => true, 'id' => $user->id]);
    }


    public function request()
    {
        return view('user.request');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function user($id)
    {
        $model = User::where('id', '=', $id)->first();
        if ($model === null) {
            return response()->view('errors.503', [], 404);
        }
        return view('user.profile', ['model' => $model]);
    }

    public function showRegister(Request $error)
    {
        return view('auth.register', ['error' => $error]);
    }

    public function doRegister(Request $request)
    {
        $rules = array(
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users|alpha_dash',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('register')
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirmation']));
        }
        // save user data
        $data = $request->all();
        $plan_password = $data['password'];
        $data['password'] = bcrypt($plan_password);
        User::create($data);

        //login user
        $userdata = array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        );
        Auth::attempt($userdata);

        return Redirect::to('/');
    }

    public function showLogin(Request $error)
    {
        return view('auth.login', ['error' => $error]);
    }

    public function doLogin(Request $request)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email' => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)// send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            // create our user data for the authentication
            $userdata = array(
                'email' => $request->input('email'),
                'password' => $request->input('password')
            );
            // attempt to do the login
            if ($result = Auth::attempt($userdata)) {
                return Redirect::to('/')->with('flash_notice', 'You are successfully logged in.');
            } else {
                $validator->getMessageBag()->add('password', trans('wrong email or password'));
                return Redirect::to('login')
                    ->withErrors($validator)
                    ->withInput($request->except('password'));
            }
        }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/'); // redirect the user to the login screen
    }

}
