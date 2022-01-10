<?php

namespace App\Service;

class Slugify
{
    public function generate(string $input): string
    {
        $input = trim($input);
        $input = preg_replace('/\s+/', '-', $input);
        $input = preg_replace('/[^A-Za-z0-9\-]/', '', $input);
        $input = strtolower($input);
        return $input;
    }
}
