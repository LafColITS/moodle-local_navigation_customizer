<?php

use local_navigation_customizer\FlatnavLinksConfig;
use local_navigation_customizer\CustomIconsConfig;

function local_navigation_customizer_extend_navigation($navigation)
{
    global $COURSE;

    $links = new FlatnavLinksConfig();

    $coursenode   = $navigation->find($COURSE->id, navigation_node::TYPE_COURSE);
    $participants = $navigation->find('participants', navigation_node::TYPE_CONTAINER);

    if ($coursenode && $participants) {
        foreach($links->getLinks() as $link) {
            $label    = $link->getLabel();
            $url      = $link->getURL();
            $icon     = $link->getIcon();
            $position = $link->getPosition() ?? 'grades';
            $key      = $link->getKey();

            $node = $navigation->create(
                $label,                        // Link text.
                $url,                          // URL.
                navigation_node::TYPE_SETTING, // Node type.
                null,                          // "Shorttext".
                $key,                          // Key.
                $icon                          // Icon.
            );

            $coursenode->add_node($node, $position);
        }
    }
}

function local_navigation_customizer_get_fontawesome_icon_map() {
    $map = (new CustomIconsConfig)->getMap();
    return $map;
}