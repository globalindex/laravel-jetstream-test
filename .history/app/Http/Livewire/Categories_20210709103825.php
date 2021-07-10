<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;

/**
 * Livewire Category Class
 */
class Categories extends Component
{
    public $modalFormVisible = false;
    public $title;
    public $slug;
    public $description;
    public $image;

    /**
     * The validation rules
     *
     * @return array
     */
    public function rules()
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

    public function updatedTitle($value)
    {
        $this->generateSlug($value);
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

    private function generateSlug($value)
    {
        # code...
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
