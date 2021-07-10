<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Validation\Rule;
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'slug' => [
                'required',
                Rule::unique('categories', 'slug')
            ],
            'description' => 'required',
        ];
    }

    /**
     * The category create function
     *
     * @return void
     */
    public function create(): void
    {
        $this->validate();

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
