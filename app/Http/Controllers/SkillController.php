<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{

    public function index() {
        if(!auth()->check()) {
            return redirect()->route('login');
        }
        $skills = Skill::all();
        return view('admin.skill', compact('skills'));
    }

    public function create()
    {
        return view('admin.addSkill');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|integer|min:0|max:100',
        ]);

        $skill = new Skill();
        $skill->name = $validatedData['name'];
        $skill->score = $validatedData['score'];
        $skill->save();

        return redirect()->route('skills')->with('success', 'Skill created successfully.');
    }

    public function delete($id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills')->with('success', 'Skill deleted successfully.');
    }
}
