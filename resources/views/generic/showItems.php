<?php
namespace show;

require_once '../../../vendor/autoload.php';


//use App\Errors\CustomException;
use App\Controllers\GenericController;






class showItems extends GenericController
{
    protected $minkey;
    protected $maxkey;

    public function __construct()
    {
        if (isset($_GET['minid'])) {
            if (filter_var($_GET['minid'], FILTER_VALIDATE_INT)) {
                $this->minkey = (int) $_GET['minid'];

            } else {
                // new CustomException(1, "Query exception. minid is not a number", basename($_SERVER['PHP_SELF']), __LINE__, );
                //echo ('warning: ');
            }

        } else {
            $this->minkey = 1;
        }
        if (isset($_GET['maxid'])) {
            if (filter_var($_GET['minid'], FILTER_VALIDATE_INT)) {
                $this->maxkey = (int) $_GET['maxid'];

            } else {
                // new CustomException(1, "Query exception. maxid is not a number", basename($_SERVER['PHP_SELF']), __LINE__, );

            }

        } else {
            $this->maxkey = $this->minkey;
        }

    }
    final public function print()
    {
        $result = parent::show('incomes', $this->minkey, $this->maxkey);
        echo ($result);

    }

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
    <?php
    $showItems = new ShowItems();
    $showItems->print();
    ?>

</body>

</html>