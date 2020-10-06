<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class TestAuth extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function testIndex()
    {
        $result = $this->call('get', '/');

        $result->assertOK();
        $result->assertSee('Register a new account');
    }
}
