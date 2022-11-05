<?php


session_start();
require __DIR__ . "/../controllers/cadastro4-Controller.php";


if (isset($_POST['btn'])) {

    $FILTER = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (in_array("", $FILTER)) {
        $_SESSION['error_empty'] = "Preencha todos os campos";
        header("Location: ../../cadastro/cadastro-4.php");
    } else {


        $inputs = [];
        $values = [];

        for ($count = 1; $count <= 6; $count++) {


            // if (in_array("procurando" . $count, $inputs)) {

            //     if(array_key_exists("procurando".$count, $inputs)){
            //         $values[$count] = $inputs[$count];
            //     }

            //     // // echo $inputs[$count];
            //     // $values[] = $inputs[$count];
            //     // echo $values;
            // }
        }

        // for ($count = 1; $count <= 6; $count++) {



        // //     echo $inputs[$count];
        // // }

        // }


        // for ($count = 1; $count <= 6; $count++) {
        //     ((new CadastroRelacionamento($inputs[$count])));
        // }

        echo "<pre>";
        var_dump($inputs);
        // header("Location: ../../cadastro/cadastro-5.php");
    }
}
