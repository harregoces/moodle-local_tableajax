<?php

require('../../config.php');
require_login();
if (!has_capability('local/tableajax:configmagement', $PAGE->context)) {
    die();
}
use local_tableajax\Records;

$PAGE->set_title('Table Ajax');
$PAGE->set_url('/local/tableajax/tableajax.php');
echo $OUTPUT->header();
$records = new Records();
$PAGE->requires->js_call_amd('local_tableajax/settings', 'init');
echo $OUTPUT->render_from_template('local_tableajax/settings', array('data' => $records->get_records(10, 0)));
echo $OUTPUT->footer();

