<?php

namespace App\View\Components\profile;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProfileLocation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render()
    {
        $user = User::with('Location')->find(auth()->user()->id);
        return view('components.profile.profile-location', ['user' => $user]);
    }
}
