@section('after-script')
<script>
    setCurrent('cms/competition')
</script>
@endsection
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Kompetisi Baru</h4>
            <form class="forms-sample">
                <x-cms.select title="Partisipan" wireModel='participant_id' :options="$participants"/>
                <x-cms.text title="Username" placeholder="Write your username .."/>
                <x-cms.text title="Email" type="email" placeholder="Write your email .."/> 
                <x-cms.text title="Password" type="password" placeholder="Write your password .."/> 
                <x-cms.text title="Confirm Password" type="password" placeholder="Write your password .."/> 
                <x-cms.checkbox title="Remember Me" wireModel='remember'/> 
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
            </div>
        </div>
</div>
