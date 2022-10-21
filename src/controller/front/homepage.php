<?php

namespace app\src\controller\front\homepage;

use CRUD;

require_once('constants.php');
require_once('src/model/CRUD.php');

$db = new CRUD();

$query = MISSIONS_SQL;

$data = $db->read($query);
require('src/templates/front/missions.php');

