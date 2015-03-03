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
 * Internal library of functions and constants for module labelcollapsed
 *
 * @package    mod
 * @subpackage labelcollapsed
 * @copyright  2011 Thomas Alsén & Mario Wehr
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

class mod_labelcollapsed_renderer extends plugin_renderer_base {

    function display_labelcollapsed(cm_info $cm) {
        global $DB;

        $lc = $DB->get_record('labelcollapsed', array('id' => $cm->instance));

        $content = html_writer::div(
            html_writer::tag('ul',
                html_writer::tag('li',
                    html_writer::tag('b',$cm->name)
                )
            ),
            'lc_header collapsed',  array('id' => 'lch'.$cm->instance));

        $content .= html_writer::div(
                format_module_intro('labelcollapsed',
                $lc, $cm->id), 'lc_content',  array('id' => 'lcc'.$cm->instance));

        return $content;
    }
}
