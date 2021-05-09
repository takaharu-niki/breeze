<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('tasks.update', [$folderId, $id]) }}" method="POST">
            @csrf
            <x-label for="title">
                ファイル名
            </x-label>
            <x-input type="text" id="title" name="title" value="{{ old('title') ?? $task->title }}" />
            <x-label for="status_id" class="mt-4">
                状態
            </x-label>
            <select name="status_id" id="status_id">
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" @if ($status->id === (old('status') ?? $task->id)) selected @endif>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
            <x-label for="expire" class="mt-4">
                期限日
            </x-label>
            <x-input type="date" id="expire" name="expire" value="{{ old('title') ?? $task->formatExpireForDateType() }}"/>
            <div class="mt-4">
                <x-button>
                    submit
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>