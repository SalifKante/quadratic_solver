<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuadraticService;

//Model import
use App\Models\QuadraticSolution;

class QuadraticController extends Controller
{
    protected $quadraticService;

    public function __construct(QuadraticService $quadraticService)
    {
        $this->quadraticService = $quadraticService;
    }

    // Show the input form for solving a quadratic equation
    public function index()
    {
        return view('quadratic.index');
    }

    // Solve the quadratic equation and display the result
    public function solve(Request $request)
    {
        $validated = $request->validate([
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'c' => 'required|numeric',
        ]);

        // Solve the quadratic equation using the QuadraticService
        $solutions = $this->quadraticService->solve($validated['a'], $validated['b'], $validated['c']);

        // / Pass x1 and x2 explicitly as separate variables
        return view('quadratic.result', ['x1' => $solutions['x1'], 'x2' => $solutions['x2']]);
    }

    // Display the history of quadratic equations solved
    public function history()
    {
        // Fetch paginated quadratic solutions, with 5 solutions per page
        $solutions = QuadraticSolution::latest()->paginate(5);

        // Pass the paginated solutions to the history view
        return view('quadratic.history', compact('solutions'));
    }

    // Delete a specific quadratic solution by ID
    public function destroy($id)
    {
        // Find the solution by ID and delete it if it exists
        $solution = QuadraticSolution::find($id);

        if ($solution) {
            $solution->delete();
            return redirect()->route('quadratic.history')->with('success', 'Решение успешно удалено');
        } else {
            return redirect()->route('quadratic.history')->with('error', 'Решение не найдено');
        }
    }
}
