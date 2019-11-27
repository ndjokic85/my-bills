<?php

namespace Tests\Feature\Front;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BillcategoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_show_the_bill_category_index_page()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->get(route('billCategory.index'))
            ->assertStatus(200);
    }
}
