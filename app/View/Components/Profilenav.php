<?php

namespace App\View\Components;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Profilenav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $class;
    public $width;
    public $height;
    public function __construct($class , $width , $height)
    {
        $this->class = $class;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $user = User::find(Auth::user()->id);
        $path = $user->profile_photo_path;
        if($path == NULL){
            $photName = 'profile.jpg';
        }else {
            $photName = $user->email.'/'.$path;
        }
        return view('components.profilenav',compact('photName'));
    }
}
