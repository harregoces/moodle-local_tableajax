<?php
/**
 * Table Ajax.
 *
 * @package    local_tableajax
 * @copyright 2021 Hernan Arregoces <harregoces@gmail.com>
 */

defined('MOODLE_INTERNAL') || die();
require_login();
global $OUTPUT, $PAGE, $CFG;

$ADMIN->add('localplugins', new admin_externalpage('tableajax', get_string('pluginname', 'local_tableajax'),
    "$CFG->wwwroot/local/tableajax/tableajax.php", 'local/tableajax:configmagement'));
