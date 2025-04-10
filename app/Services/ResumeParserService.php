<?php

namespace App\Services;
use App\Models\Skill;

class ResumeParserService
{
    public static function parse($text)
    {
        $name = self::extractName($text);
        $email = self::extractEmail($text);
        $skills = self::extractSkills($text);

        return compact('name', 'email', 'skills');
    }

    public static function extractEmail($text)
    {
        preg_match('/[a-z0-9.\-_]+@[a-z0-9.\-]+\.[a-z]{2,}/i', $text, $matches);
        return $matches[0] ?? null;
    }

    public static function extractSkills($text)
    {
        $skills = Skill::all();
        $matched = [];

        foreach ($skills as $skill) {
            if (stripos($text, $skill->name) !== false) {
                $matched[] = $skill->name;
            }
        }

        return $matched;
    }

    public static function extractName($text)
    {
        // Simple regex or fallback: first line
        $lines = explode("\n", $text);
        $name = trim($lines[0]);  
        $name = preg_replace('/^(name: |\'name: |Name: )/i', '', $name);
        return $name ?? 'Unknown';
    }
}
