<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('tasks.store', $folderId) }}" method="POST">
            @csrf
            <x-label for="title">
                ファイル名
            </x-label>
            <x-input type="text" id="title" name="title" value="{{ old('title') }}" />
            <x-label for="expire" class="mt-4">
                期限日
            </x-label>
            <x-input type="date" id="expire" name="expire" value="{{ old('expire') }}"/>
            <div class="mt-4">
                <x-button>
                    submit
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>