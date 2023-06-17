<div class="form-group flex flex-col"  x-data="{value: @entangle($wireModel)}"
    x-init="$nextTick(() => {
            select2 = $('#select2').select2();
            select2.on('select2:select', (event) => {value = event.target.value});
            })" wire:ignore>
    <label class="{{ $labelClass }}" for="{{ $id }}">{{ $title }}</label>
    <select x-ref="select"
    x-bind:value="value" wire:model='{{ $wireModel }}' class="form-control form-control-lg {{ $inputClass }}" style="font-size: 16px" id="select2" name="{{ $name }}" {{ $addAttributes }}>
        <option>{{ $firstOption }}</option>
        @foreach ($options as $key=>$value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
