<?php

namespace App\Http\Livewire\Cms\Competition;

use Livewire\Component;
use App\Models\Competition;
use App\Models\Participant;
use App\Models\CompetitionLevel;

class CreateCompetition extends Component
{

    // define eloquent model to use direct data binding
    public Competition $competition;

    public $participants;
    public $competition_level;
    public $status = ['Active','Non Active'];

    // POST
    protected $rules = [
        'competition.participant_id'=>'required|integer',
        'competition.competition_level_id'=>'required|integer',
        'competition.competition_name'=>'required|string',
        'competition.begin_date'=>'required|date',
        'competition.end_date'=>'required|date',
        'competition.status'=>'nullable',
    ];

    public function render()
    {
        return view('livewire.cms.competition.create-competition')
        ->extends('layouts.cms_layout')
        ->section('main-content');
    }

    public function mount(){
        $this->participants = Participant::pluck('participant_name','id');
        $this->competition_level = CompetitionLevel::pluck('level_name','id');
        $this->competition = new Competition();
    }

    public function backToIndex()
    {
        return redirect(route('cms.competition.index'));
    }

    public function save()
    {
        $this->validate();

        $this->competition->save();

        session()->flash('success', 'New competition successfully created.');

        return redirect(route('cms.competition.index'));
    }
}
