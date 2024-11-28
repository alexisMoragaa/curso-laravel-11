<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <p class="mt-4">
        El Contador es:  {{$count}}
    </p>

    <button class="rounded bg-blue-500 hover:bg-blue-700 py-2 px-4" wire:click="increment">
        Sumar
    </button>
    <button class="rounded bg-red-500 hover:bg-red-700 py-2 px-4" wire:click="decrement">
        Restar
    </button>
</div>
