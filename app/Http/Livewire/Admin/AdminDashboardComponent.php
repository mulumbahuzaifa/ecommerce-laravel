<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboard-component')->layout('layouts.base');
    }
}