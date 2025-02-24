@section('after-script')
<script>
    setCurrent('cms/admin')
</script>
@endsection
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Show Admin #{{ $admin->id }}</h4>

            @include('components.cms.alert')
            <form class="forms-sample" wire:submit.prevent="save">
                <x-text title="Nama Pengguna" wireModel='admin.name' placeholder="Nama Pengguna *" addAttributes="disabled"/>
                <x-text title="Alamat" wireModel='admin.address' placeholder="Alamat *" addAttributes="disabled"/>
                <x-text type="email" title="Email" wireModel='email' placeholder="Email *" addAttributes="disabled"/>
                <x-select2 title="Role *" wireModel='role' :options="$roles" addAttributes="disabled"/>

                @can('cms.admins.update')
                    <a type="button" class="btn btn-warning mr-2" href="{{ route('cms.admin.edit',['admin'=>$admin->id]) }}">Edit</a>
                @endcan
                <button type="button" class="btn btn-outline-danger" wire:click='backToIndex'>Cancel</button>
            </form>
            </div>
        </div>
</div>
