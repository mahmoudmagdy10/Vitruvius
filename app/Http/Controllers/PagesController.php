<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vitruvius\Project\Models\Project;

class PagesController extends Controller
{
    public function homepage() {
        return view('pages.homepage');
    }
    public function explore()
    {
        try{
            $contractor = User::select()->find(Auth::user()->id);
            $projects = Project::orderBy('id', 'DESC')->paginate(10);

            if (!$contractor) {
                return redirect()->route('login');
            } else {
                return view('pages.contractor.explore')->with(compact('contractor','projects'));
            }

        } catch (\Exception $e) {
            return redirect()->route('login');
        }

    }

}
