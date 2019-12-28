<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;

class ManageProjectsTest extends TestCase
{

    use WithFaker, RefreshDatabase, WithoutMiddleware;

    /** @test */

    public function guests_cannot_manage_projects()
    {
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();
        
        $this->get('/projects')->assertRedirect('/login'); //view        
        
        // $this->get('/projects')->assertStatus(302); //redirect        
        
        $this->get('/projects/create')->assertRedirect('/login'); //create        
        
        $this->get($project->path())->assertRedirect('/login'); //view specific        
        
        $this->post('/projects', $project->toArray())->assertRedirect('/login');        
    }

    /** @test  

    public function only_authenticated_users_can_view_projects()
    {
        // $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $this->get('/projects')->assertRedirect('/login');
    }
*/

    /** @test */
    
    public function a_user_can_create_a_project()
    
    {

        // $this->withoutExceptionHandling();
        $this->WithoutMiddleware();
        $this->actingAs(factory('App\User')->create());
        $this->get('/projects/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $attributes)->assertRedirect('/projects');
        
        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    /** @test */

    public function a_user_can_view_their_project()
    {
        $this->be(factory('App\User')->create());

        //$this->withoutExceptionHandling();

        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);
        
        //dd($project->title);
        //dump($project->title);
        $this->get($project->path())
             ->assertSee($project->title)
             ->assertSee($project->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->be(factory('App\User')->create());

        // $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();

        $this->get($project->path())->assertStatus(403);
       
    }

    /** @test */

    public function a_project_requires_a_title()
    {

        $this->WithoutMiddleware();
        // $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());

        $attributes = factory('App\Project')->raw(['title' => '']);

        $this->post('/projects', $attributes)->assertSessionHasErrors('title');        

    }

    /** @test */

    public function a_project_requires_a_description()
    {
        $this->WithoutMiddleware();
        // $this->withoutExceptionHandling();
        $this->actingAs(factory('App\User')->create());
        $attributes = factory('App\Project')->raw(['description' => '']);
        
        $this->post('/projects', $attributes)->assertSessionHasErrors('description');        

    }

}
