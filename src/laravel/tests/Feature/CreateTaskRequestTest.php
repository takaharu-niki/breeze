<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;

/**
 * @coversDefaultClass CreateTaskRequest
 */
class CreateTaskRequestTest extends TestCase
{
    use RefreshDatabase;

    /**
     * デフォルトのシーダーが各テストの前に実行するかを示す
     *
     * @var bool
     */
    protected $seed = true;

    /**
     * @covers FolderController::create
     * @return void
     */
    public function test_create_folder()
    {
        $response = $this->get(route('folders.create'));

        $response->assertStatus(200);
    }

    /**
     * @covers FolderController::store
     * @return void
     */
    public function test_store_folder()
    {
        $response = $this->post(route('folders.store'), [
            'title' => 'test',
        ]);

        $response->assertStatus(302);
    }

    /**
     * viewのテストの意義がよくわからん
     */
    // public function test_a_task_index_view_can_be_rendered()
    // {
    //     $view = $this->view('folders/create');

    //     $view->assertSee('submitt');
    // }

    /**
     * 
     */
    public function test_expire_is_not_confirmed_except_date()
    {
        $task = Task::factory()->make([
            'expire' => 122,
        ]);

        $response = $this->post(route('tasks.store', $task->folder_id), [
            'folder_id' => $task->folder_id,
            'title' => $task->title,
            'expire' => $task->expire,            
        ]);

        $response->assertSessionHasErrors([
            'expire' => '期限日 には年/月/日を入力してください。',
        ]);
    }

    /**
     * 
     */
    public function test_expire_is_not_confirmed_except_after_today()
    {
        $task = Task::factory()->make([
            'expire' => date('Y-m-d', strtotime('-1 day')),
        ]);

        $response = $this->post(route('tasks.store', $task->folder_id), [
            'folder_id' => $task->folder_id,
            'title' => $task->title,
            'expire' => $task->expire,
        ]);

        $response->assertSessionHasErrors([
            'expire' => '期限日 には今日以降の日付を入力してください。',
        ]);
    }
}
