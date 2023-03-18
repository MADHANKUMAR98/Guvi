<?php
require '../vendor/autoload.php';
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'guvi';
$conn = mysqli_connect($host, $user, $password, $dbname);
// echo 'working';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    // echo $count;
    $t0 = 0;
    $t1 = 0;

    if ($count == 1) {
        //connect to redisserver  

        $redis = new Predis\Client();
        // $redis->set('name','prasanth');  
        // echo $redis->get('name');
        $cacheentry = $redis->get('data');
        // echo 'connected';
        // $id = uniqid();
        // $redis->set($id,$username);
        //The cookie will expire after 30 days (86400 * 30)
        // setcookie('id',$id,time()+ (86400 * 30),'/','');  
        // if ($cacheentry) {
        //     // $t0 = microtime(true)*1000;
        //     // $t1 = microtime(true)*1000;
        // } else {
        while ($row = $result->fetch_assoc()) {
            // echo $row['email'];
            // echo $row['password'];
            $temp = $row['email'] . ' ' . $row['password'] . '<br/>';
        }
        $redis->set('data', json_encode($temp));
        // $redis->expire('data', 86400 );
        $res = [
            "msg"=>"success",
            "status"=>"200",
            "user"=>$result

        ];
        // }

        // echo "success";
        // header('Location: ../profile.html');
        // exit;
        echo json_encode($res);
        // return;
    } else {
        echo "Invalid username or password";
    }
}

mysqli_close($conn);
exit;
?>
