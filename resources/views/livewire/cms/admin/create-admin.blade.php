@section('after-script')
<script>
    setCurrent('cms/admin')
</script>
@endsection
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Admin Baru</h4>

            @include('components.cms.alert')
            <form class="forms-sample" wire:submit.prevent="save">
                <x-cms.text title="Nama Pengguna" wireModel='admin.name' placeholder="Nama Pengguna" addAttributes="required"/>
                <x-cms.text title="Alamat" wireModel='admin.address' placeholder="Alamat" addAttributes="required"/>
                <x-cms.text type="email" title="Email" wireModel='email' placeholder="Email" addAttributes="required"/>
                <x-cms.select title="Role" wireModel='role' :options="$roles" addAttributes="required"/>
                <div class="flex gap-5">
                    <x-cms.text type="{{ $isVisible?'text':'password' }}" formClass="flex-grow" inputClass="w-full" title="Password" wireModel='password' placeholder="Password" addAttributes="required"/>
                    <x-cms.text type="{{ $isVisible?'text':'password' }}" formClass="flex-grow" inputClass="w-full" title="Confirm Password" wireModel='confirmPassword' placeholder="Comfirm Password" addAttributes="required"/>
                </div>
                <div style="margin-top: -1rem!important">
                    <x-cms.checkbox title="Show Password" wireModel='isVisible'/>
                </div>
                @if ($password != $confirmPassword)
                    <div class="text-sm text-error mb-8" style="margin-top: -1rem!important">
                        Password is not match
                    </div>
                @endif
                <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                <button type="button" class="btn btn-outline-danger" wire:click='backToIndex'>Cancel</button>
            </form>
            </div>
        </div>
</div>
