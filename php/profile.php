<?php
require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // $email = $_POST['email'];
// $email = 'prasanthdeva18@gmail.com';
$email = 'prasanthvennila@gmail.com';   


    $client = new MongoDB\Client("mongodb://localhost:27017");


    $collection = $client->guvidb->users;


    $cursor = $collection->find([
        'email'=>$email
    ]);

    $data = array();

    foreach ($cursor as $document) {
        $data[] = $document;
    }

    $json =  json_encode($data);

    echo $json;

}

exit;
?>
