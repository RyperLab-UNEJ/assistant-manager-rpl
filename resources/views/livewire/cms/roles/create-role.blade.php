@section('after-script')
<script>
    setCurrent('cms/roles')
</script>
@endsection
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Role Baru</h4>

            @include('components.cms.alert')
            <form class="forms-sample" wire:submit.prevent="save">

                <x-cms.text title="Alamat" wireModel='role.name' placeholder="Name" addAttributes="required"/>
                <x-cms.select title="Role" wireModel='role.guard_name' :options="$guards" addAttributes="required"/>

                <div class="table-responsive pt-3 mb-10">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            Resource Name
                          </th>
                          <th>
                            View All
                          </th>
                          <th>
                            View One
                          </th>
                          <th>
                            Create
                          </th>
                          <th>
                            Update
                          </th>
                          <th>
                            Delete
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($permissionOptions as $key=>$value)
                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_',' ',$key)) }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[6] }}" type="checkbox">
                                    </div>
                                    {{-- <x-cms.checkbox title="" value="{{ $value[6] }}" wireModel='permissions'/> --}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[5] }}" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[0] }}" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[4] }}" type="checkbox">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[1] }}" type="checkbox">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                {{-- <x-cms.text title="Nama Pengguna" wireModel='admin.name' placeholder="Nama Pengguna" addAttributes="required"/>
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
                @endif --}}
                <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                <button type="button" class="btn btn-light" wire:click='backToIndex'>Cancel</button>
            </form>
            </div>
        </div>
</div>
