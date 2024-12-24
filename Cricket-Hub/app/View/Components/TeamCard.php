<?php
namespace App\View\Components;

use Illuminate\View\Component;

class TeamCard extends Component
{
    public $team; // Public property to hold the team data

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($team)
    {
        $this->team = $team; // Assign the passed team to the property
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.team-card');
    }
}
