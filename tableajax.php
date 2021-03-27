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
 * External setting page for local_tableajax
 *
 * @package    local_tableajax
 * @copyright  2021 Hernan Arregoces <harregoces@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');
require_login();
if (!has_capability('local/tableajax:configmagement', $PAGE->context)) {
    die();
}
use local_tableajax\Records;

$PAGE->set_title('Table Ajax');
$PAGE->set_url('/local/tableajax/tableajax.php');
$PAGE->set_pagelayout('admin');
$strheading = get_string('pluginname', 'local_datatabledemo');
$PAGE->set_title($strheading);
$PAGE->set_heading($strheading);
$PAGE->requires->js_call_amd('local_tableajax/settings', 'init');

echo $OUTPUT->header();
$records = new Records();
echo $OUTPUT->render_from_template('local_tableajax/settings', array('data' => $records->get_records(10, 0)));
echo $OUTPUT->footer();

