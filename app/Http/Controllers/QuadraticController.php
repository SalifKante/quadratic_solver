<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuadraticService;

class QuadraticController extends Controller
{
    protected $quadraticService;

    public function __construct(QuadraticService $quadraticService)
    {
        $this->quadraticService = $quadraticService;
    }

    public function index()
    {
        return view('quadratic.index');
    }

    public function solve(Request $request)
    {
        $validated = $request->validate([
            'a' => 'required|numeric',
            'b' => 'required|numeric',
            'c' => 'required|numeric',
        ]);

        $solution = $this->quadraticService->solve($validated['a'], $validated['b'], $validated['c']);

        return view('quadratic.result', compact('solution'));
    }
    public function history()
    {
        // Fetch paginated quadratic solutions, with 5 solutions per page (you can change this number)
        $solutions = \App\Models\QuadraticSolution::latest()->paginate(5);

        // Pass the paginated solutions to the view
        return view('quadratic.history', compact('solutions'));
    }
    public function destroy($id)
    {
        // Find the solution by ID and delete it
        $solution = \App\Models\QuadraticSolution::find($id);

        if ($solution) {
            $solution->delete();
        }

        // Redirect back to the history page with a success message
        return redirect()->route('quadratic.history')->with('success', 'Решение успешно удалено');
    }


}
