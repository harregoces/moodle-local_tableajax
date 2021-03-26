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
 * This is the external API for local_tableajax.
 *
 * @package    local_tableajax
 * @copyright  2021 Hernan Arregoces <harregoces@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_tableajax;
defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/externallib.php");
use local_tableajax\Records;

/**
 * This is the external API for local_tableajax
 *
 * @copyright  2021 Hernan Arregoces <harregoces@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class external extends \external_api {

    public static function get_data_parameters() {
        $limit = new \external_value(PARAM_INT, 'result set limit', VALUE_DEFAULT, 0);
        $offset = new \external_value(PARAM_INT, 'Result set offset', VALUE_DEFAULT, 0);
        $params = array('limit' => $limit, 'offset' => $offset);
        return new \external_function_parameters($params);
    }

    public static function get_data($limit, $offset): array {
        global $DB;
        $params = self::validate_parameters(self::get_data_parameters(),
            array(
                'limit' => $limit,
                'offset' => $offset
            )
        );
        $records = new Records();
        $data = $records->get_records($params['limit'], $params['offset']);
        return $data;
    }

    public static function get_data_returns() {
        return new \external_multiple_structure(
            new \external_single_structure(array(
                'id' => new \external_value(PARAM_INT, 'Field ID'),
                'eventname' => new \external_value(PARAM_RAW, 'Field short name'),
                'component' => new \external_value(PARAM_RAW, 'Field name'),
                'action' => new \external_value(PARAM_RAW, 'Field name'),
                'target' => new \external_value(PARAM_RAW, 'Field name')
            ))
        );
    }
}

