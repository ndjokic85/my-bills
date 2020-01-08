<?php

namespace Tests\Feature\Front;

use App\Model\Front\BillCategory;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BillCategoryTest extends TestCase
{
  use  RefreshDatabase, WithFaker;

  /** @test */
  public function anonymous_users_cannot_see_bill_categories_list()
  {
    $response = $this->get(route('billCategory.index'))
      ->assertRedirect('/login');
  }

  /** @test */
  public function anonymous_users_cannot_store_bill_category()
  {
    $data = factory(BillCategory::class)->make();
    $response = $this->post(route('billCategory.store'), $data->toArray());
    $this->assertCount(0, BillCategory::all());
  }

  /** @test */
  public function authenticated_users_can_see_the_categories_list()
  {
    $this->actingAs(factory(User::class)->create());
    $response = $this->get(route('billCategory.index'))
      ->assertOk();
  }

  /** @test */
  public function authenticated_users_can_see_bill_category_creation_page()
  {
    $this->actingAs(factory(User::class)->create());
    $response = $this->get(route('billCategory.create'))
      ->assertStatus(200);
  }

  /** @test */
  public function authenticated_users_can_store_bill_category()
  {
    $this->actingAs(factory(User::class)->create());
    $data = factory(BillCategory::class)->make();
    $response = $this->post(route('billCategory.store'), $data->toArray());
    $this->assertCount(1, BillCategory::all());
  }

  /** @test */
  public function a_name_is_required()
  {
    $this->actingAs(factory(User::class)->create());
    $data = factory(BillCategory::class)->make(['name' => '']);
    $response = $this->post(route('billCategory.store'), $data->toArray())
      ->assertSessionHasErrors('name');
  }

  /** @test */
  public function a_name_is_at_least_3_chars()
  {
    $this->actingAs(factory(User::class)->create());
    $data = factory(BillCategory::class)->make(['name' => 'te']);
    $response = $this->post(route('billCategory.store'), $data->toArray())
      ->assertSessionHasErrors('name');
  }

  /** @test */
  public function a_due_day_is_required()
  {
    $this->actingAs(factory(User::class)->create());
    $data = factory(BillCategory::class)->make(['due_day' => '']);
    $response = $this->post(route('billCategory.store'), $data->toArray())
      ->assertSessionHasErrors('due_day');
  }
  /** @test */
  public function a_valid_from_is_required()
  {
    $this->actingAs(factory(User::class)->create());
    $data = factory(BillCategory::class)->make(['valid_from' => '']);
    $response = $this->post(route('billCategory.store'), $data->toArray())
      ->assertSessionHasErrors('valid_from');
  }
  /** @test */
  public function a_valid_to_is_required()
  {
    $this->actingAs(factory(User::class)->create());
    $data = factory(BillCategory::class)->make(['valid_to' => '']);
    $response = $this->post(route('billCategory.store'), $data->toArray())
      ->assertSessionHasErrors('valid_to');
  }

  /** @test */
  public function authenticated_users_can_update_bill_category()
  {
    $this->actingAs(factory(User::class)->create());
    $data =  factory(BillCategory::class)->create();
    $data->name = 'Updated category';
    $response = $this->put(route('billCategory.update', $data->id), $data->toArray());
    $this->assertDatabaseHas('bill_categories', ['id' => $data->id, 'name' => 'Updated category1']);
  }
}
