<?php

namespace local_navigation_customizer;

use local_navigation_customizer\FlatnavLink;

class FlatnavLinksConfig extends MultilineConfig
{
    private $links;

    public function __construct()
    {
        $parsed = $this->parse(
            get_config('local_navigation_customizer', 'flatnav_links')
        );

        $links = [];

        foreach ($parsed as $line) {
            if (!empty($line)) {
                $link = new FlatnavLink($line);
            }

            if ($link->isValid()) {
                $links[] = $link;
            }
        }

        $this->links = $links;
    }

    public function getLinks()
    {
        return $this->links;
    }
}