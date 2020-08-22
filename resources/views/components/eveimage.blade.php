@props(['type' => 'unknown', 'id' => 1, 'name' => '', 'size' => 64])

@if ($type === 'unknown')
    <img src="{{ img_url('characters', 'portrait', 1, $size) }}" style="height: {{$size}}px; width: {{$size}}px;" class="eveimage img-rounded" alt="Unknown">
@else 
    <a href="#" rel="tooltip" title="" data-original-title="{{ $name }}">
        <img src="{{ img_url($type, $type === 'characters' ? 'portrait' : 'logo', $id, $size) }}" style="height: {{$size}}px; width: {{$size}}px;" class="eveimage img-rounded" alt="{{ $name }}">
    </a>
@endif
