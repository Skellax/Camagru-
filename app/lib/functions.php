<?php

 function generate_token(): string
{
    return password_hash(bin2hex(random_bytes(16)), PASSWORD_DEFAULT);
}

function get_mail($user): bool
{
    $to = $user->email;

    $activationLink = "http://localhost:8080/index.php?action=activate&token=" .urlencode($user->token);



    $subject = 'Validation d\'inscription';

    $message ='
    <html>
        <head>
        <title>Validation d\' inscription </title>
        </head>
        <body>
        <p>Hello ' .  htmlspecialchars($user->username) . '</p>
        <br>

        <p>Pour valider ton inscription clique sur ce lien:  $activationLink</p>
        </body>
    </html>
    ';

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    mail($to, $subject, $message, implode("\r\n", $headers));

}