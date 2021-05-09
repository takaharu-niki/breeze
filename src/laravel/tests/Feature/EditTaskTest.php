<?php

namespace Tests\Feature;

use App\Models\Task;
use Database\Seeders\FolderSeeder;
use Database\Seeders\StatusSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 
     */
    // public function test_status_id_is_not_confirmed_in_empty()
    // {
    //     $this->seed(FolderSeeder::class);
    //     $this->seed(StatusSeeder::class);

    //     $task = Task::factory()->create();

    //     $data = [
    //         'title' => $task->title,
    //         'expire' => $task->expire,
    //         'status_id' => '',
    //     ];

    //     $request = $this->post(route('tasks.update', [
    //         $task->folder_id,
    //         $task->id,
    //     ]), $data);

    //     $request->assertSessionHasErrors([
    //         'status_id' => '状態 を入力する必要があります。',
    //     ]);
    // }

    /**
     * 
     */
    public function test_status_id_is_not_confirmed_in_undefined_status()
    {
        $this->seed(FolderSeeder::class);
        $this->seed(StatusSeeder::class);

        $task = Task::factory()->create();

        $data = [
            'title' => $task->title,
            'expire' => $task->expire,
            'status_id' => 62,
        ];

        $request = $this->post(route('tasks.update', [
            $task->folder_id,
            $task->id,
        ]), $data);

        $request->assertSessionHasErrors([
            'status_id' => '状態 には 着手中、未着手、完了 のいずれかを指定してください。',
        ]);
    }
}
