<?php

namespace app\src\controller\front\missionDetail;


use CRUD;

require_once('constants.php');
require_once('src/model/CRUD.php');

$db= new CRUD();

$sql = MISSION_DETAIL_PRETTY_SQL . $identifier;

$data = $db->read($sql);
require_once('src/templates/front/missionDetail.php');
