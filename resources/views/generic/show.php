<?php
//use App\Errors\CustomException;

$minkey = 0;
$maxkey = 0;
if (isset($_GET['minid'])) {
    if (filter_var($_GET['minid'], FILTER_VALIDATE_INT)) {
        $minkey = (int) $_GET['minid'];

    } else {
        // new CustomException(1, "Query exception. minid is not a number", basename($_SERVER['PHP_SELF']), __LINE__, );
        echo ('warning: ');
    }

} else {
    $minkey = 1;
}
if (isset($_GET['maxid'])) {
    if (filter_var($_GET['minid'], FILTER_VALIDATE_INT)) {
        $maxkey = (int) $_GET['maxid'];

    } else {
        // new CustomException(1, "Query exception. maxid is not a number", basename($_SERVER['PHP_SELF']), __LINE__, );

    }

} else {
    $maxkey = $minkey;
}



class show
{

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>