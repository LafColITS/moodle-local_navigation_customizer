<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Settings
 *
 * @package    local_navigation_customizer
 * @copyright  2019 onwards Lafayette College ITS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot. '/local/navigation_customizer/lib.php');

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_navigation_customizer', get_string('pluginname', 'local_navigation_customizer'));

    $settings->add(new admin_setting_configtextarea('local_navigation_customizer/flatnav_links',
        get_string('settings:flatnav_links:desc', 'local_navigation_customizer'),
        get_string('settings:flatnav_links:subdesc', 'local_navigation_customizer'),
        get_string('settings:flatnav_links:default', 'local_navigation_customizer')));

    $settings->add(new admin_setting_configtextarea('local_navigation_customizer/custom_icons',
        get_string('settings:custom_icons:desc', 'local_navigation_customizer'),
        get_string('settings:custom_icons:subdesc', 'local_navigation_customizer'),
        get_string('settings:custom_icons:default', 'local_navigation_customizer')));

    $ADMIN->add('localplugins', $settings);
}