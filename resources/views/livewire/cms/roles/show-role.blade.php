@section('after-script')
<script>
    setCurrent('cms/roles')
</script>
@endsection
<div class="card">
        <div class="card-body">
            <h4 class="card-title">Show Role {{ $role->id }}</h4>

            @include('components.cms.alert')
            <form class="forms-sample" wire:submit.prevent="save">

                <x-text title="Name" wireModel='role.name' placeholder="Name" addAttributes="disabled"/>
                <x-select title="Guard" wireModel='role.guard_name' :options="$guards" addAttributes="disabled"/>

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
                                        <input wire:model='permissions' value="{{ $value[6] }}" type="checkbox" disabled>
                                    </div>
                                    {{-- <x-checkbox title="" value="{{ $value[6] }}" wireModel='permissions'/> --}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[5] }}" type="checkbox" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[0] }}" type="checkbox" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[4] }}" type="checkbox" disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <input wire:model='permissions' value="{{ $value[1] }}" type="checkbox" disabled>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  @can('cms.roles.update')

                  <a type="button" class="btn btn-warning mr-2" href="{{ route('cms.roles.edit',['role'=>$role->id]) }}">Edit</a>
                  @endcan

                <button type="button" class="btn btn-outline-danger" wire:click='backToIndex'>Cancel</button>
            </form>
            </div>
        </div>
</div>
