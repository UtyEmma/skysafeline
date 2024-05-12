<button 
    {{$attributes->merge([
        'class' => 'btn'
    ])->except(['wire:loading', 'wire:target'])}}
>
    @if ($attributes->has('wire:loading'))
        <span wire:loading.remove {{$attributes->only(['wire:target'])}}>
            {{$slot}}
        </span>
        <x-spinner {{$attributes->only(['wire:loading', 'wire:target'])}} />
    @else
        {{$slot}}
    @endif
</button>