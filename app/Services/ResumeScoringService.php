<?php

namespace App\Services;
use App\Models\Skill;

class ResumeScoringService
{
    public static function calculateScore(array $skills)
    {
       $scorings = Skill::all();
       $totalScore = 0;
       $matchedKeywords  = [];

    //    foreach($scorings as $rule) {
    //     if(stripos($text, $rule->name) !== false) {
    //         $totalScore += $rule->score;
    //         $matchedKeywords[] = $rule->name;
    //     }
    //    }

    foreach ($scorings as $rule) {
        foreach ($skills as $skill) {
            if (stripos($skill, $rule->name) !== false) {
                $totalScore += $rule->score;
                $matchedKeywords[] = $rule->name;
                break; // prevent duplicate score from multiple matches
            }
        }
    }
       return [
        'score' => $totalScore,
        'matched_keywords' => $matchedKeywords,
       ];
    }
}
