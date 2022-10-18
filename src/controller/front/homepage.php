<?php

namespace app\controller\front\homepage;

use app\model\DatabaseConnection\DatabaseConnection;

require_once('constants.php');
require_once('src/model/DatabaseConnection.php');

$Database = New DatabaseConnection();

$sql = MISSIONS_SQL;

$data = $Database->select($sql);
require('src/templates/front/missions.php');

