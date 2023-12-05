<?php

namespace App\Http\Livewire;

use App\Models\Page;
use Livewire\Component;

class PolicyComponent extends Component
{
    public function render()
    {
        $page=Page::first();
        return view('livewire.policy-component',['page'=>$page])->layout('livewire.layouts.front');
    }
}
