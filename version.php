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
 * Table Ajax.
 *
 * @package    local_tableajax
 * @copyright 2021 Hernan Arregoces <harregoces@gmail.com>
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version = 2021032601;
$plugin->requires = 2020060900;
$plugin->cron = 0;
$plugin->component = 'local_tableajax';
$plugin->maturity = MATURITY_ALPHA;
$plugin->release = 'v1';
$plugin->dependencies = array();
