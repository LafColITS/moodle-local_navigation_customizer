<?php

namespace local_navigation_customizer;

class CustomIconsConfig extends MultilineConfig
{
    private $map;

    public function __construct()
    {
        $parsed = $this->parse(
            get_config('local_navigation_customizer', 'custom_icons')
        );

        $this->map = [];

        array_walk($parsed, function($subarray, $id) {
            $this->map['local_navigation_customizer:' . $subarray[0]] = $subarray[1];
        });
    }

    public function getMap(): ?array
    {
        return $this->map;
    }
}