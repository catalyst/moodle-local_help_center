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
 * Lib file for callbacks.
 *
 * @package   local_help_center
 * @author    Dmitrii Metelkin (dmitriim@catalyst-au.net)
 * @copyright Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Implements call back before_footer
 *
 * @see https://docs.moodle.org/dev/Output_callbacks#before_footer
 *
 * @throws \dml_exception
 */
function local_help_center_before_footer() {
    global $PAGE, $OUTPUT;

    $config = get_config('local_help_center');
    $excluded = ['embedded'];

    if (!empty($config->enabled) && !in_array($PAGE->pagelayout, $excluded)) {
        $PAGE->requires->js_call_amd('local_help_center/help-block', 'init');

        echo $OUTPUT->render_from_template(
            'local_help_center/help-block',
            ['config' => $config]
        );
    }
}
