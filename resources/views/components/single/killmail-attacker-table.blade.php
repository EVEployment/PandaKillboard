<table class="table table-sm table-hover bg-light mb-1">
    @if (isset($title))
        <thead>
            <tr class="titles">
                {{ $title }}
            </tr>
        </thead>
    @endif
    
    <tbody>
        {{ $slot }}
    </tbody>
</table>
