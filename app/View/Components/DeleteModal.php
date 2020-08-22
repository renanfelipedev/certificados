<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    public $modalId;

    public $message;

    public $btnText;

    public $formAction;

    public $formName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalId, $message, $btnText, $formAction, $formName)
    {
        $this->modalId = $modalId;
        $this->message = $message;
        $this->btnText = $btnText;
        $this->formAction = $formAction;
        $this->formName = $formName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.delete-modal');
    }
}
