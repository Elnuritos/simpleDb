<?php

namespace Tests\Unit;

use Tests\TestCase;

class BonusTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/api/payfield/134230822');

        $this->assertEquals(200, $response['bonus']);
    }
}
