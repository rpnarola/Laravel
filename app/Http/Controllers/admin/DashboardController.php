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
 * @author rp
 */
class DashboardController extends Controller
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

        return view('admin/dashboard');
    }
}
