<?php

namespace Router;

use App\Errors\CustomException;

class RouterHandler
{

    protected $method;
    protected $data;

    public function set_method($method)
    {
        $this->method = $method;
    }

    public function set_data($data)
    {
        $this->data = $data;
    }


    public function route($controller, $id, $table = 'incomes')
    {
        $resource = new $controller();
        if ($controller != 'App\Controllers\GenericController') {


            switch ($this->method) {

                case "get":
                    if ($id && $id == "create")
                        $resource->create();
                    else if ($id)
                        $resource->show($id);
                    else
                        $resource->index();
                    break;

                case "post":
                    $resource->store($this->data);
                    break;

                case "delete":
                    $resource->delete($id);
                    break;

            }
            print_r($controller);


        } else if ($controller == 'App\Controllers\GenericController') {
            $columnheads = ["payment_method", "type", "date", "amount", "description"];
            switch ($this->method) {

                case "get":
                    if ($id && $id == "create")
                        $resource->create();
                    else if ($id)
                        $resource->show($id);
                    else
                        $resource->index($table);
                    break;

                case "post":
                    $resource->store($this->data, 'incomes', $columnheads);
                    break;

                case "delete":
                    $resource->delete($id);
                    break;
            }



        } else {
            new CustomException(1, "RouterHandler Exception, route was neither incomes, withdrawals nor generic. Error in if conditional", basename($_SERVER['PHP_SELF']), __LINE__, );

        }

    }

}