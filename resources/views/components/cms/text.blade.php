{{-- This component can use all html input type --}}
<div class="form-group">
    <label for="{{ $id }}" class="{{ $labelClass }}">{{ $title }}</label>
    <input wire:model='{{ $wireModel }}' type="{{ $type }}" class="form-control {{ $inputClass }}" id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" {{ $addAttributes }}>
</div>