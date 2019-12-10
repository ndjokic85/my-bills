<?php

namespace Tests\Feature\Front;

use App\Model\Front\BillCategory;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BillCategoryTest extends TestCase
{
  use RefreshDatabase, WithFaker;

  /** @test */
  public function only_logged_in_users_can_see_bill_categories_list()
  {
    $response = $this->get('/billCategory')
      ->assertRedirect('/login');
  }
  /** @test */
  public function authenticated_users_can_see_the_categories_list()
  {
    $this->actingAs(factory(User::class)->create());
    $response = $this->get('/billCategory')
      ->assertOk();
  }

  /** @test */
  public function authenticated_users_can_see_bill_category_creation_page()
  {
    $this->actingAs(factory(User::class)->create());
    $response = $this->get('/billCategory/create')
      ->assertStatus(200);
  }

  /** @test */
  public function authenticated_users_can_store_bill_category()
  {
    $this->actingAs(factory(User::class)->create());
    $name = $this->faker->name;
    $dueDay = $this->faker->time;
    $validFrom = $this->faker->time;
    $validTo = $this->faker->time;
    $response = $this->post(route('billCategory.store'), [
      'name' => $name,
      'due_day' => $dueDay,
      'valid_from' => $validFrom,
      'valid_to' => $validTo,
    ]);
    $this->assertCount(1, BillCategory::all());
  }
}
