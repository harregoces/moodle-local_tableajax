<?php

namespace local_tableajax;
defined('MOODLE_INTERNAL') || die();
require_once("$CFG->libdir/externallib.php");

class Records {
    
    public function get_records($limit, $offset) {
        global $DB;
        $records = $DB->get_records('logstore_standard_log', null, 'id ASC', 'id, eventname, component, action, target', $offset, $limit);
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
