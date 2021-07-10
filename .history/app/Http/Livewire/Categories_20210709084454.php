<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $modalFormVisible = false;
    public $title;
    public $slug;
    public $description;
    public $image;

    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.categories');
    }
}
