<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTasksTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());
    }
}
