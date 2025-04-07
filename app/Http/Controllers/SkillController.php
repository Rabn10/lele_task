<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|integer|min:0|max:100',
        ]);

        $skill = new \App\Models\Skill();
        $skill->name = $validatedData['name'];
        $skill->score = $validatedData['score'];
        $skill->save();

        return response()->json(['message' => 'Skill created successfully!', 'skill' => $skill], 201);

    }
}
