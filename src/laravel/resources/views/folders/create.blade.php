<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('folders.store') }}">
            @csrf   
            <x-label for="title">
                フォルダ名
            </x-label>
            <x-input id="title" type="text" name="title" value="{{ old('title') }}">
            </x-input>
            <div class="mt-4">
                <x-button>
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>