<?php

namespace App\Livewire;

use Livewire\Component;

class Contador extends Component
{

    public $count = 0;
    public function render()
    {
        return view('livewire.contador');
    }

    public function increment(){
        $this->count++;
    }

    public function decrement(){
        $this->count--;
    }
}
