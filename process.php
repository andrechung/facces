<html lang="zh-TW">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>FACCES</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
      rel="stylesheet"
      type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>    <![endif]-->
  </head>
  <body>
  <nav id= "nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation"></nav>
        <div style="margin-top: 100px; margin-left: 150px">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

    //mysql credentials
    $mysql_host = "localhost";
    $mysql_username = "facceseu_admin";
    $mysql_password = "F@ccesEU";
    $mysql_database = "facceseu_main";

    $data["group"] = filter_var(isset($_POST['group']) ? $_POST['group'] : "", FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
    $data["duration"] = filter_var(isset($_POST['duration']) ? $_POST['duration'] : "", FILTER_SANITIZE_EMAIL);
    $data["nationality"] = filter_var($_POST["nationality"], FILTER_SANITIZE_STRING);
    $data["passport_number"] = filter_var($_POST["passport_number"], FILTER_SANITIZE_STRING);
    $data["passport_lastname"] = filter_var($_POST["passport_lastname"], FILTER_SANITIZE_STRING);
    $data["passport_givenname"] = filter_var($_POST["passport_givenname"], FILTER_SANITIZE_STRING);
    $data["chinese_name"] = filter_var($_POST["chinese_name"], FILTER_SANITIZE_STRING);
    $data["birthday"] = filter_var($_POST["birthday"], FILTER_SANITIZE_STRING);
    $data["occupation"] = filter_var($_POST["occupation"], FILTER_SANITIZE_STRING);
    $data["home_Phone"] = filter_var($_POST["home_Phone"], FILTER_SANITIZE_STRING);
    $data["mobile"] = filter_var($_POST["mobile"], FILTER_SANITIZE_STRING);
    $data["email"] = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
    $data["home_address"] = filter_var($_POST["home_address"], FILTER_SANITIZE_STRING);
    $data["language"] = filter_var(isset($_POST['language']) ? $_POST['language'] : "", FILTER_SANITIZE_STRING);
    $data["church_name"] = filter_var($_POST["church_name"], FILTER_SANITIZE_STRING);
    $data["role"] = filter_var(isset($_POST['role']) ? $_POST['role'] : "", FILTER_SANITIZE_STRING);
    $data["dates_of_stay"] = filter_var($_POST["dates_of_stay"], FILTER_SANITIZE_STRING);
    $data["room_size"] = filter_var(isset($_POST['room_size']) ? $_POST['room_size'] : "", FILTER_SANITIZE_STRING);
    $data["roomates"] = filter_var($_POST["roomates"], FILTER_SANITIZE_STRING);
    $data["food_arrangement"] = filter_var($_POST["food_arrangement"], FILTER_SANITIZE_STRING);
    $data["parking"] = filter_var(isset($_POST['parking']) ? $_POST['parking'] : "", FILTER_SANITIZE_STRING);
    $data["comment"] = filter_var($_POST["comment"], FILTER_SANITIZE_STRING);

    $insert_sql1 = "";
    $insert_sql2 = "";
    $bind_sql3 = "";
    foreach ($data as $key => $value) {
        if (!isset($value)) {
            $value = "";
        }
        $insert_sql1 .= "$key,";
        $insert_sql2 .= "?,";
        $bind_sql3 .= "s";
    }
    $insert_sql1 = substr($insert_sql1, 0, -1);
    $insert_sql2 = substr($insert_sql2, 0, -1);

    //Open a new connection to the MySQL server
    //see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    $mysqli->query("SET NAMES utf8");


    $sql = "INSERT INTO `forum_october2017` VALUES(". $insert_sql2 . ")";
    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    // echo $sql . "<br>";
    //echo $bind_sql3;


    $stmt = $mysqli->prepare($sql); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $stmt->bind_param($bind_sql3, $data["group"],$data["duration"],$data["nationality"],$data["passport_number"],$data["passport_lastname"],$data["passport_givenname"],$data["chinese_name"],$data["birthday"],$data["occupation"],$data["home_Phone"],$data["mobile"],$data["email"],$data["home_address"],$data["language"],$data["church_name"],$data["role"],$data["dates_of_stay"],$data["room_size"],$data["roomates"],$data["food_arrangement"],$data["parking"],$data["comment"]); //bind values and execute insert query

   // $statement = $mysqli->prepare("INSERT INTO forum_october2017(group, duration) VALUES(?, ?)");
   // $statement->bind_param('ss',$code, $language);




if (!$stmt) {
    die('PROCESS REGISTRATION ISSUE');
}


    if($stmt->execute()){
        print "Thank you for your registration.";
    }else{
        print $mysqli->error; //show mysql error if any
         die('PROCESS REGISTRATION ISSUE');
    }


    $message = "";

    foreach ($data as $key => $value) {
        $message .= "<div class=\"label1\">$key : $value</div>\n";
    }
    echo "<H3>SUBCRIPTION REGISTRED</H3>";
    echo  $message;
    $headers = "Content-Type: text/html; charset=\"utf-8\"";
    $res=mail('andre1773@gmail.com, ngy_thanh@yahoo.fr, edkwong10@gmail.com, jdaide2014@gmail.com, revchaoyu@hotmail.com, gusfung@london-cac.org.uk', "Subcription to FACCES FORUM from " . $data['passport_lastname'] . " "  . $data['passport_givenname'], $message, $headers);

}
?>
</div>

    <script src="js/nav.js"></script>
    <script src="js/analytics.js"></script>
  </body>
</html>

