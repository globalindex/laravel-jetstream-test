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

    /**
     * Runs everytime the title
     * variable is updated
     *
     * @param  mixed $value
     * @return void
     */
    public function updatedTitle($value)
    {
        $this->_generateSlug($value);
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

    public function read()
    {
        return Category::paginate(5);
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
     * Generates a url slug
     * base on the title
     *
     * @param  mixed $value
     * @return void
     */
    private function _generateSlug($value)
    {
        $this->slug = strtolower(str_replace(" ", "-", $value));
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
