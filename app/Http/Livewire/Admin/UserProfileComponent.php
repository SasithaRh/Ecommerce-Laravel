<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
class UserProfileComponent extends Component
{
    public function render()
    {
        $user= User::find()->user()->id;
        return view('livewire.admin.user-profile-component',['users'=>$user])->layout('layouts.base');
    }
}
