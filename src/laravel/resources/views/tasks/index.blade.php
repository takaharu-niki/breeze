<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="flex justify-evenly">
            <div>
                <a href="{{ route('folders.create') }}">
                    <x-button>
                        add folder
                    </x-button>
                </a>
                <ul>
                    @foreach ($folders as $folder)
                        <li>
                            <a href="{{ route('tasks.index', $folder->id) }}" class="{{ $folder->id === $currentFolderId ? 'bg-green-200' : '' }}">
                                {{ $folder->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                @if ($existsFolder)
                    <a href="{{ route('tasks.create', $currentFolderId) }}">
                        <x-button>
                            add task
                        </x-button>
                    </a>
                @endif
                @if ($existsTask)
                    <table>
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>状態</th>
                                <th>期限</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                @if ($task->folder_id === $currentFolderId)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->status->name }}</td>
                                        <td>{{ $task->formatExpireForList() }}</td>
                                        <td><x-button><a href="{{ route('tasks.edit', [$task->folder_id, $task->id]) }}">edit</a></x-button></td>
                                        <td>
                                                <form action="{{ route('tasks.destroy', [$task->folder_id, $task->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                            <x-button>
                                                    delete
                                            </x-button>
                                                </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </x-auth-card>
</x-guest-layout>