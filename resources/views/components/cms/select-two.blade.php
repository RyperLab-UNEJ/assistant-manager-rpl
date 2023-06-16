@section('component-script')

<script>
    $(document).ready(function () {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            var data = $('#select2').select2("val");
        @this.set({{ $wireModel }}, data);
        });
    });
</script>
@endsection
<div class="form-group flex flex-col" wire:ignore>
    <label class="{{ $labelClass }}" for="{{ $id }}">{{ $title }}</label>
    <select wire:model='{{ $wireModel }}' class="form-control form-control-lg {{ $inputClass }}" style="font-size: 16px" id="{{ $id }}" name="{{ $name }}" {{ $addAttributes }}>
        <option>{{ $firstOption }}</option>
        @foreach ($options as $key=>$value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
