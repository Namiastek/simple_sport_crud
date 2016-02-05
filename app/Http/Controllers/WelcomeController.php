<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2016-01-10
 * Time: 19:00
 */

namespace App\Http\Controllers;


use Redirect;
use Auth;
use Config;
use Illuminate\Http\Request as RequestSave;
use Session;
use App\Models\Team;

//<TODO>FLASHE
class WelcomeController extends Controller
{

    public function index()
    {
        dd(Team::first());

        return view('scripts.simulator.body');

    }

    public function add(RequestSave $request, $id = null) {
        if(is_null($id)) {
            if (Request::isMethod('post')) {
                $node = new Node;
                $node->name  = $request->name;
                $node->ip  = $request->ip;
                $node->save();

            }



        }
        return view('scripts.simulator.add');
    }

}