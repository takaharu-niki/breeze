<?php

namespace Tests\Feature;

use App\Models\Folder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateFoldersTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * 
     */
    public function test_create_folder()
    {
        $folder = Folder::factory()->make();

        $data = [
            'title' => $folder->title,
        ];
        $this->post(route('folders.store'), $data);
        
        $this->assertDatabaseCount('folders', 1);

        $this->assertDatabaseHas('folders', $data);
    }
}
