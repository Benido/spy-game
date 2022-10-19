<?php

namespace app\src\controller\front\homepage;

use app\src\model\DatabaseConnection\DatabaseConnection;

require_once('constants.php');
require_once('src/model/DatabaseConnection.php');

$Database = New DatabaseConnection();

$query = MISSIONS_SQL;

$data = $Database->select($query);
require('src/templates/front/missions.php');

