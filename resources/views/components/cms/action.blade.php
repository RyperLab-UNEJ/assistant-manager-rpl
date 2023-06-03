<div class="flex">
    <button wire:click="performAction('show',{{ $id }})"  class="p-1 text-teal-600 hover:bg-teal-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
    </button>
    <button wire:click="performAction('edit',{{ $id }})" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
    </button>
    {{-- <x-modal :value="$id" :name="$name">
        <x-slot name="trigger">
        </x-slot>
        <h1 class="text-2xl text-purple-700">{{ $name }}xxxxxxxxxxx</h1>
    </x-modal> --}}

    @include('datatables::delete', ['value' => $id])

</div>


{{-- <div class="dropdown dropdown-end">
    <label tabindex="0" class="btn btn-sm btn-info p-2">Action <i class="fa-solid fa-caret-down ml-1 mr-1"></i></label>
    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
        <li><a wire:click="performAction('create')">Show</a></li>
        <li><a>Edit</a></li>
        <li class="text-error"><button wire:click="deleteData({{ $id }})">Delete</button></li>
    </ul>
</div> --}}
