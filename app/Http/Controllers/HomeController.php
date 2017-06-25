<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use JavaScript;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //send some php variables to javascript
        JavaScript::put([
            'user_id' => Auth::id(),
            'username' => Auth::user()->username
        ]);
        //$tasks = Task::where('')
        return view('home');
    }
}
