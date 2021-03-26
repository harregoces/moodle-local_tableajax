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

namespace local_tableajax;
defined('MOODLE_INTERNAL') || die();
require_once("$CFG->libdir/externallib.php");

/**
 * Class Records
 *
 * @package local_tableajax
 * @copyright  2021 Hernan Arregoces <harregoces@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class Records {

    /**
     * Returns records for specific table
     *
     * @param int $limit
     * @param int $offset
     * @return array
     * @throws \dml_exception
     */
    public function get_records(int $limit = 10, int $offset = 0): array {
        global $DB;
        $records = $DB->get_records('logstore_standard_log',
            null,
            'id ASC',
            'id, eventname, component, action, target',
            $offset,
            $limit
        );
        $returned = array();
        foreach ($records as $data) {
            $details = array(
                'id' => $data->id,
                'eventname' => $data->eventname,
                'component' => $data->component,
                'action' => $data->action,
                'target' => $data->target
            );
            $returned[] = $details;
        }

        return $returned;
    }
}
