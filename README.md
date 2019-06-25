# Flat Navigation Customizer

[![Build Status](https://travis-ci.org/LafColITS/moodle-local_navigation_customizer.svg?branch=master)](https://travis-ci.org/LafColITS/moodle-local_navigation_customizer)

## Adding custom links to the flat navigation (left-hand sidebar)

You may add arbitrary custom links to the flat navigation by adding lines to the "Custom flatnav links" textarea. Each line represents a single link. The items are as follows:

```
<link text> | <url> | <namespace>:<icon> | <position>
```

Example configuration:

```
Help | https://fake.edu/moodle-help | local_navigation_customizer:question | grades
Google | https://www.google.com | t/go | grades
One more | https://www.example.com | t/calc | 1
```

Note that the first line requires the use of custom icon mappings (see below).

### Link text [REQUIRED]

Simply the text that will display in the navigation.

### URL [REQUIRED]

The URL it will link to; relative URLs should work.

### Icon

This item should reference a Moodle icon identifier. These look like `t/calc`, `i/edit`, etc. If you're referencing a base Moodle icon, you need only specify this part. If you are referencing an icon that is part of a component, you will need to add the namespace followed by a colon, like so: `mod_assign:gradefeedback`.

Examples:

```
t/calc
mod_assign:gradefeedback
local_navigation_customizer:t/envelope
```

Here is a somewhat outdated (list of available Moodle icons)[https://docs.moodle.org/dev/images_dev/e/e8/Moodle_icons_24.pdf].

### Position

The "position" argument is a navigation node identifier. The custom link will be added to the navigation _before_ the node corresponding to this identifier. For example, if you enter `participants` here, your custom link will appear above the Participants link in the flat navigation. You can determine the identifier key of any given navigation node by examining the HTML `<a>` element; the key is in the `data-key` property. In a standard course, the navigation structure is:

```
coursehome   ([Course Shortname])
participants (Participants)
badgesview   (Badges)
competencies (Competencies)
grades       (Grades)
1            (First Section)
2            (Second Section)
...
```

#### Keys of custom links

Custom navigation links created with this plugin receive generated identifier keys. The given label is lowercased and spaces are replaced with underscores, so "Link" becomes `link` and "My Special Link" becomes `my_special_link`.

### Tokens

There are replacement token(s) available for the Label and URL arguments. Currently the following tokens are implemented:
* {COURSEID}

## Providing custom icon mappings

Moodle allows the use of a subset of FontAwesome icons. However, not all of these are exposed through Moodle's icon API. Using the "Custom icon mappings" setting, you can add new mappings to expose (some) arbitrary FontAwesome icons for use elsewhere in the plugin configuration. The configuration field is a textarea in which each line represents a single mapping. The left-hand value is the Moodle icon ID, and the right-hand value is the fontawesome identifier. Here is an example:

```
t/envelope | fa-envelope
```

This will allow you to use the `fa-envelope` icon elsewhere in the configuration by referencing `local_navigation_customizer:t/envelope`.

_You must refresh your cache after changing this configuration option._