<?php

namespace local_navigation_customizer;

class MultilineConfig
{
    public function parse($raw)
    {
        return array_map(function($line) {
            return $this->parseLine($line);
        }, explode("\n", $raw));
    }

    public function parseLine($raw)
    {
        return array_map('trim', explode('|', $raw));
    }
}