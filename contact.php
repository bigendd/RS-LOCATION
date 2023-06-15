<?php 
    require_once(__DIR__ . '/vendor/autoload.php');
    use \Mailjet\Resources;
    define('API_PUBLIC_KEY', '5c7c4cd907c2b8c64de96eda82c44de2');
    define('API_PRIVATE_KEY', '9e375a4b9577097ff154a58f8f55cf96');
    $mj = new \Mailjet\Client(API_PUBLIC_KEY, API_PRIVATE_KEY,true,['version' => 'v3.1']);


    if(!empty($_POST['surname']) && !empty($_POST['firstname']) && !empty($_POST['email']) 
    && !empty($_POST['sujet']) && !empty($_POST['message'])){
        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $email = htmlspecialchars($_POST['email']);
        $sujet = htmlspecialchars($_POST['sujet']);
        $message = htmlspecialchars($_POST['message']);
        

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $body = [
            'Messages' => [
            [
                'From' => [
                'Email' => "isetif149@gmail.com",
                'Name' => "rs-location"
                ],
                'To' => [
                [
                    'Email' => "isetif149@gmail.com",
                    'Name' => "rs_location"
                ]
                ],
                'Subject' => "demande de renseignement",
                'TextPart' => "$email, $message", 
                
            ]
            ]
        ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success();
            echo "Email envoyé avec succès !";
        }
        else{
            echo "Email non valide";
        }

    } else {
        header('Location: contact.php');
        die();
    }