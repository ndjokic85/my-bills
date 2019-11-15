<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BillcategoryTest extends TestCase
{
    /**
     * @test
     */
    public function user_can_read_bill_categories()
    {
        $billCategory = factory('App\Model\BillCategory')->create();
        $response = $this->get('/billCategory');
        $response->assertSee($billCategory->name);
    }
}
