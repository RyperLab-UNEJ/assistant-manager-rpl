<?php

namespace App\Http\Livewire\Cms\Competition;

use App\Models\Competition;
use App\Models\Participant;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CompetitionIndex extends LivewireDatatable
{
    public $model = Competition::class;
    public $participant;

    public function __construct()
    {
        $this->participant = Participant::plucK('participant_name');
    }

    public function Builder(){
        return Competition::query()
        ->leftJoin('participants', 'participants.id', 'competitions.participant_id');
    }

    public function columns()
    {
        return [
        NumberColumn::name('id')
        ->label('ID'),
        Column::name('participant.participant_name')
            ->label('Participant')
            ->filterable($this->participant),
        Column::name('competition_name')
            ->label('Competition Name')
            ->searchable(),
        Column::name('status')
            ->label('Status')
            ->filterable(),

        ];
    }
}
