<div class="my-10">
    <div
        class="p-4 relative z-10 bg-white border rounded-xl md:p-10 dark:bg-neutral-900 dark:border-neutral-700">
        <div class="mb-5">
            <h1 class="font-semibold text-xl">Ready to Reclaim Your Assets? Act Now!</h1>
            <p class="text-gray-500 text-sm md:text-base">Fill out the form below with your case details, and our
                expert team will respond within hours to begin the process of recovering your
                assets.</p>
        </div>
        <form wire:submit="submit">
            @if ($message)
                <div class="mb-4">
                    <p class="text-sm text-{{$status ?? 'green-600'}}">{{$message}}</p>
                </div>
            @endif
            <div class="mb-4">
                <x-input.label>Your Name</x-input.label>
                <x-input wire:model="name" placeholder="Full name"/>
                <x-input.error key="name" />
            </div>

            <div class="grid grid-cols-2 mb-4 gap-4">
                <div>
                    <x-input.label>Your Email Address</x-input.label>
                    <x-input wire:model="email" type="email" placeholder="Email Address"/>
                    <x-input.error key="email" />
                </div>

                <div>
                    <x-input.label>Phone Number</x-input.label>
                    <x-input wire:model="phone" type="tel" placeholder="Phone Number"/>
                    <x-input.error key="phone" />
                </div>
            </div>

            <div class="mb-4">
                <x-input.label>The name of the company that scammed you</x-input.label>
                <x-input wire:model="company" placeholder="The name of the company that scammed you"/>
                <x-input.error key="company" />
            </div>

            <div class="mb-4">
                <x-input.label>Amount</x-input.label>
                <x-input wire:model="amount" placeholder="Amount"/>
                <x-input.error key="amount" />
            </div>

            <div class="mb-4">
                <x-input.label>Details of transaction(s)</x-input.label>
                <x-input.textarea wire:model="details" placeholder="Provide information about the transaction"/>
                <x-input.error key="details" />
            </div>

            @if ($message)
                <div class="mb-4">
                    <p class="text-sm text-{{$status ?? 'green-500'}}">{{$message}}</p>
                </div>
            @endif

            <div class="grid">
                <x-button wire:loading wire:target="submit" class="w-full btn-primary">Submit</x-button>
            </div>
        </form>
    </div>
</div>
