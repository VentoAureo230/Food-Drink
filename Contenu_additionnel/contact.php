<?php
    require_once(__DIR__.'/vendor/autoload.php');
    use \Mailjet\Resources;

    define('API_USER','d4b424ac359a26e1f84e2a2275ec73d2');
    define('API_LOGIN','3f96ea188bfa9360a7bfa9aadcfff9b1');
    $mj = new \Mailjet\Client(API_USER, API_LOGIN,true,['version' => 'v3.1']);

    if(!empty($_POST['surname']) && !empty($_POST['firstname'] && !empty($_POST['email'] && !empty($_POST['message'])){
        $surname = htmlspecialchars($_POST['surname']);
        $firstname = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => "anthony.meny35@gmail.com",
                            'Name' => "Food&Drink"
                        ],
                        'To' => [
                            [
                                'Email' => "ventoaureo230@yahoo.com",
                                'Name' => "Admin"
                            ]
                        ],
                        'Subject' => "Demande de renseignement",
                        'TextPart' => "$email, $message",
                    ]
                ]
            ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success() && var_dump($response->getData());
            echo "Email envoyé avec succès !";
        
        }else{
            echo "Email non conforme";
        }

    }else{
        heade('Location:index.php');
        die();
    }