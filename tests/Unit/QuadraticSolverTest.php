<?php

namespace Tests\Feature;

use App\Services\QuadraticService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuadraticSolverTest extends TestCase
{
    //RefreshDatabase -- Removes all the records from your database
    //use RefreshDatabase;

    protected $quadraticService;

    protected function setUp(): void
    {
        parent::setUp();
        // Initialize the QuadraticService instance
        $this->quadraticService = new QuadraticService();
    }

    /** @test */
    public function it_returns_two_solutions_when_discriminant_is_positive()
    {
        $a = 1;
        $b = -3;
        $c = 2;

        $result = $this->quadraticService->solve($a, $b, $c);

        // Assert that two solutions are returned
        $this->assertNotNull($result['x1']);
        $this->assertNotNull($result['x2']);

        // Assert that the solution is saved in the database
        $this->assertDatabaseHas('quadratic_solutions', [
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'x1' => $result['x1'],
            'x2' => $result['x2']
        ]);
    }

    /** @test */
    public function it_returns_one_solution_when_discriminant_is_zero()
    {
        $a = 1;
        $b = -2;
        $c = 1;

        $result = $this->quadraticService->solve($a, $b, $c);

        // Assert that only one solution (x1) is returned
        $this->assertNotNull($result['x1']);
        $this->assertNull($result['x2']);

        // Assert that the solution is saved in the database
        $this->assertDatabaseHas('quadratic_solutions', [
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'x1' => $result['x1'],
        ]);
    }

    /** @test */
    public function it_returns_no_real_solutions_when_discriminant_is_negative()
    {
        $a = 1;
        $b = 2;
        $c = 5;

        $result = $this->quadraticService->solve($a, $b, $c);

        // Assert that no solutions (x1 or x2) are returned
        $this->assertNull($result['x1']);
        $this->assertNull($result['x2']);

        // Assert that the solution is saved in the database
        $this->assertDatabaseHas('quadratic_solutions', [
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'x1' => null,
            'x2' => null,
        ]);
    }
}
