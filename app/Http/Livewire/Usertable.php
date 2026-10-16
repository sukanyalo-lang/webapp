<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Usertable extends Component
{
    public function delete(int $userid)
    {
        User::where("id", $userid)->delete();
    } 
    
    public function render()
    {
        $users = User::query()
                    ->get();
        
        return view('livewire.usertable', compact('users'));

        // return view('livewire.usertable');
    }
}
