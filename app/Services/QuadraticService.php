<?php

namespace App\Services;

// Model import
use App\Models\QuadraticSolution;

class QuadraticService
{
    public function solve($a, $b, $c)
    {
        // Calculate the discriminant
        $discriminant = ($b * $b) - (4 * $a * $c);

        // Initialize x1 and x2 as null
        $x1 = null;
        $x2 = null;

        // Determine the solution
        if ($discriminant < 0) {
            $solution = 'No real solutions.';
        } elseif ($discriminant == 0) {
            $x1 = -$b / (2 * $a);  // Only one solution
            $solution = "One solution: x = $x1";
        } else {
            $sqrtD = sqrt($discriminant);
            $x1 = (-$b + $sqrtD) / (2 * $a);
            $x2 = (-$b - $sqrtD) / (2 * $a);
            $solution = "Two solutions: x1 = $x1, x2 = $x2";
        }

        // Store the solution (x1 and x2) in the database as separate columns
        QuadraticSolution::create([
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'x1' => $x1,
            'x2' => $x2,
        ]);

        // Return x1 and x2 in an array format
        return [
            'x1' => $x1,
            'x2' => $x2,
        ];
    }
}
