<?php
include('product/TableView.php');
use parts\product\TableView as TableView;

header('content-type: application/json; charset=utf-8');

if (isset($_POST['action']) && $_POST['action'] == 'mix-and-match') {

    $TV = new TableView([
        'minProds' => 3,
        'maxProds' => 7,
        'pagination' => false,
    ]);

    $data = $TV->mixAndMatch();

} else {
    $data = [[['Try again tomorrow, same hour.']]];
}

echo json_encode($data);