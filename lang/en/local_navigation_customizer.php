<?php

$string['pluginname'] = 'Navigation Customizer';
$string['settings:custom_icons:default'] = 't/envelope | fa-envelope';
$string['settings:custom_icons:desc'] = 'Custom icon map';
$string['settings:custom_icons:subdesc'] = '
Map to expose fontawesome icons. One icon mapping per line.

Referenced like "local_navigation_customizer:<moodle icon identifier>".

Format:

&lt;moodle icon identifier&gt; | &lt;font awesome icon identifier&gt;
';
$string['settings:flatnav_links:default'] = "
Test | www.example.com | t/calc | participants
Report | /a/fake/report?courseid={COURSEID} | local_navigation_customizer:t/envelope
Google | www.google.com
";
$string['settings:flatnav_links:desc'] = 'Custom flatnav links';
$string['settings:flatnav_links:subdesc'] = '
Custom links that will be added to the flatnav. One link per line.

Format:

&lt;link text/label&gt; | &lt;url&gt; | &lt;namespace&gt;:&lt;icon&gt; | &lt;position (navigation node id)&gt;

Label and URL are required. The following replacement tokens may be used in these two arguments:
<ul>
<li>{COURSEID}</li>
</ul>

Icon is optional. If included, namespace may be omitted for base Moodle icons.
Here is the best available <a href="https://docs.moodle.org/dev/images_dev/e/e8/Moodle_icons_24.pdf">list of Moodle icons</a>.

Position is a navigation node id/key. Custom link will be added to the navigation _before_ the node corresponding to this identifier.
In a standard course, the navigation structure is:

<pre>
coursehome   ([Course Shortname])
participants (Participants)
badgesview   (Badges)
competencies (Competencies)
grades       (Grades)
1            (First Section)
2            (Second Section)
3...
</pre>

You can find the id of any navigation node by inspecting the link element\'s "data-key" property.
';
