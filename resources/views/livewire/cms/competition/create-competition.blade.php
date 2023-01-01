@section('after-script')
<script>
    setCurrent('cms/competition')
</script>
@endsection
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Kompetisi Baru</h4>
            <form class="forms-sample" wire:submit.prevent="save">
                <x-cms.select title="Partisipan" wireModel='competition.participant_id' :options="$participants"/>
                <x-cms.select title="Competition Level" wireModel='competition.competition_level_id' :options="$competition_level"/>
                <x-cms.text title="Competition Name" wireModel='competition.competition_name' placeholder="Write competition name here .."/>
                <x-cms.select title="Status" wireModel='competition.status' :options="$status"/>
                <x-cms.text title="Begin Date" type="date" wireModel='competition.begin_date'/>
                <x-cms.text title="End Date" type="date" wireModel='competition.end_date' />



                <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                <button type="button" class="btn btn-light" wire:click='backToIndex'>Cancel</button>
            </form>
            </div>
        </div>
</div>
