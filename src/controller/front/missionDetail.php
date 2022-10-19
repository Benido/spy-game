<?php

namespace app\src\controller\front\missionDetail;

use app\src\model\DatabaseConnection\DatabaseConnection;

require_once('constants.php');
require_once('src/model/DatabaseConnection.php');

$Database = New DatabaseConnection();

$sql = MISSION_DETAIL_SQL . $identifier;

$data = $Database->select($sql);
require_once('src/templates/front/missionDetail.php');
