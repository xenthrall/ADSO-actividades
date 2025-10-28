<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 10;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }

    public function mostrar()
    {
        dd("El valor del contador es: " . $this->count);
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
