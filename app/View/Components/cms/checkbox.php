<?php

namespace App\View\Components\cms;

use Illuminate\View\Component;

class checkbox extends Component
{
    public $id;
    public $name;
    public $title;
    public $value;
    public $labelClass;
    public $inputClass;
    public $wireModel;
    public $addAttributes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(  
    $title,
    $wireModel, // comment this line if you not use livewire
    $id='',    
    $name='',
    $value=true,
    $labelClass='',
    $inputClass='',
    $addAttributes='',)
    {
        $this->id = $id;
        $this->name= $name;
        $this->title = $title;
        $this->value = $value;
        $this->labelClass = $labelClass;
        $this->inputClass = $inputClass;
        $this->addAttributes = $addAttributes;
        $this->wireModel = $wireModel;
    }

    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cms.checkbox');
    }
}
