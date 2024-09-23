<?php

namespace App\Services;

use App\Models\QuadraticSolution;  // Make sure to import the model

class QuadraticService
{
    public function solve($a, $b, $c)
    {
        // Calculate the discriminant
        $discriminant = ($b * $b) - (4 * $a * $c);

        // Determine the solution
        if ($discriminant < 0) {
            $solution = 'No real solutions.';
        } elseif ($discriminant == 0) {
            $x = -$b / (2 * $a);
            $solution = "One solution: x = $x";
        } else {
            $sqrtD = sqrt($discriminant);
            $x1 = (-$b + $sqrtD) / (2 * $a);
            $x2 = (-$b - $sqrtD) / (2 * $a);
            $solution = "Two solutions: x1 = $x1, x2 = $x2";
        }

        // Store the solution in the database
        QuadraticSolution::create([
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'solution' => $solution,
        ]);

        return $solution;  // Return the solution for displaying to the user
    }
}
