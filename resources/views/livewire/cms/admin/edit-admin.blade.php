@section('after-script')
<script>
    setCurrent('cms/admin')
</script>
@endsection
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Admin #{{ $admin->id }}</h4>

            @include('components.cms.alert')
            <form class="forms-sample" wire:submit.prevent="save">
                <x-cms.text title="Nama Pengguna" wireModel='admin.name' placeholder="Nama Pengguna *" addAttributes="required"/>
                <x-cms.text title="Alamat" wireModel='admin.address' placeholder="Alamat *" addAttributes="required"/>
                <x-cms.text type="email" title="Email" wireModel='email' placeholder="Email *" addAttributes="required"/>
                <x-cms.select title="Role *" wireModel='role' :options="$roles" addAttributes="required"/>
                <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                <button type="button" class="btn btn-outline-danger" wire:click='backToIndex'>Cancel</button>
            </form>
            </div>
        </div>
</div>
