<?php

@session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_POST)), true);
} else {
    $info = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', json_encode($_GET)), true);
}


$controller = new dashboardController();
switch ($info[func]) {
    case "initialtopContent":
        echo $controller->initial_topContent();
        break;
}

class dashboardController {

    public function __construct() {
        
    }

    public function initial_topContent() {
        include '../service/dashboardService.php';
        $service = new dashboardService();
        $_dataTable = $service->initial_topContent();
        if ($_dataTable != NULL) {
            return json_encode($_dataTable);
        } else {
            return NULL;
        }
    }

    public function range_date($i) {
        $date = date_create(date("Y-m-d", new DateTimeZone('Asia/Bangkok')), new DateTimeZone('Asia/Bangkok'));
        return date_format(date_add($date, date_interval_create_from_date_string('-' . $i . ' days')), 'Y-m-d');
    }

    public function qty_by_date($i) {
        $date = date_create(date("Y-m-d", new DateTimeZone('Asia/Bangkok')), new DateTimeZone('Asia/Bangkok'));
        $condition = date_format(date_add($date, date_interval_create_from_date_string('-' . $i . ' days')), 'Y-m-d');
        $service = new dashboardService();
        $_data = $service->countContact($condition);
        return $_data[0][cnt];
    }

    public function donut_by_type($i) {
        $service = new dashboardService();
        $_data = $service->countNewsletterDonut($i);
        return $_data[0][cnt];
    }

}
