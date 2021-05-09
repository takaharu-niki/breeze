<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\FolderSeeder;
use Database\Seeders\StatusSeeder;

class CreateTasksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 
     */
    public function test_create_task()
    {
        $this->seed(FolderSeeder::class);
        $this->seed(StatusSeeder::class);

        $task = Task::factory()->make();

        $data = [
            'folder_id' => $task->folder_id,
            'title' => $task->title,
            'expire' => $task->expire,
        ];
        $this->post(route('tasks.store', $task->folder_id), $data);

        $this->assertDatabaseCount('tasks', 1);

        $this->assertDatabaseHas('tasks', $data);
    }
}
