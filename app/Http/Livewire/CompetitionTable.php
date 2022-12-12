<?php

namespace App\Http\Livewire;

use App\Models\Competition;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;

class CompetitionTable extends DataTableComponent
{
    protected $model = Competition::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectEnabled();
        $this->setRememberColumnSelectionEnabled();

    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Participant", "participant.participant_name")
                ->sortable(),
            Column::make("Competition Level", "competition_level.level_name")
                ->sortable(),
            Column::make("Competition name", "competition_name")
                ->sortable(),
            Column::make("Begin date", "begin_date")
                ->sortable(),
            Column::make("End date", "end_date")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            // LinkColumn::make('Action')
            // ->title(fn($row) => 'Edit')
            // ->location(fn($row) => route('cms.index', $row)),
            ButtonGroupColumn::make('Actions')
            ->attributes(function($row) {
                return [
                    'class' => 'row',
                ];
            })
            ->buttons([
                LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                    ->title(fn($row) => 'Show')
                    ->location(fn($row) => route('cms.index', $row))
                    ->attributes(function($row) {
                        return [
                            'class' => 'btn btn-primary btn-sm m-1 w-100',
                        ];
                    }),
                LinkColumn::make('Edit')
                    ->title(fn($row) => 'Edit')
                    ->location(fn($row) => route('cms.index', $row))
                    ->attributes(function($row) {
                        return [
                            'target' => '_blank',
                            'class' => 'btn btn-warning btn-sm m-1 w-100',
                        ];
                    }),
                LinkColumn::make('Delete')
                    ->title(fn($row) => 'Delete')->html()
                    ->location(fn($row) => route('cms.index', $row))
                    ->attributes(function($row) {
                        return [
                            'target' => '_blank',
                            'class' => 'btn btn-danger btn-sm m-1 w-100',
                        ];
                    }),
            ]),
            // Column::make('Actions')
            //     ->view('cms.actions.action',[
            //         'show'=>'cms.index',
            //         'edit'=>'cms.index',
            //         'delete'=>'cms.index'
            //     ]),
            // Column::make('Name')->excludeFromColumnSelect()
            // ->format(
            //     fn($value, $row, Column $column) => view('cms.actions.action',[
            //         'show'=>'cms.index',
            //         'edit'=>'cms.index',
            //         'delete'=>'cms.index'
            //     ])
            // ),
        ];
    }
}
