<?php

class Customizer
{
    private $navigation;

    public function __construct($navigation) {
        $this->navigation = $navigation;
    }

    public function applyCustomization()
    {
        $config = new FlatnavLinksConfig();
    }
}