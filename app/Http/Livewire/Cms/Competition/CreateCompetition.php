<?php

namespace App\Http\Livewire\Cms\Competition;

use App\Models\CompetitionLevel;
use App\Models\Participant;
use Livewire\Component;

class CreateCompetition extends Component
{
    public $participants;
    public $competition_level;
    public $peserta = [];
    public $remember;

    // POST
    public $participant_id;
    public $competition_level_id;
    public function render()
    {
        return view('livewire.cms.competition.create-competition')
        ->extends('layouts.cms_layout')
        ->section('main-content');
    }

    public function mount(){
        $this->participants = Participant::pluck('participant_name','id');
        $this->competition_level = CompetitionLevel::pluck('level_name','id');
    }
}
