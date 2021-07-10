<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $modalFormVisible = false;
    public string $title;
    public string $slug;
    public string $description;
    public string $image;

    /**
     * The validation rules
     *
     * @return void
     */
    public function rules(): void
    {
        return [
            'title' => 'required|string',
            'slug' => [
                'required',
                
            ],
        ];
    }

    /**
     * The category create function
     *
     * @return void
     */
    public function create(): void
    {
        Category::create($this->modelData());

        $this->modalFormVisible = false;
        $this->resetVars();
    }

    /**
     * Shows the form modal
     * of the create function
     *
     * @return void
     */
    public function createShowModal()
    {
        $this->modalFormVisible = true;
    }

    /**
     * The data for the model mapped
     * in this component
     *
     * @return void
     */
    public function modelData()
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
        ];
    }

    /**
     * Reset all the variables
     * to null
     *
     * @return void
     */
    public function resetVars()
    {
        $this->title = null;
        $this->slug = null;
        $this->description = null;
        $this->image = null;
    }

    /**
     * The livewire render function
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.categories');
    }
}
