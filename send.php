<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>ঈদ সেলামি</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-responsive.min.css"/>

    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>

    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>

<div id="fb-root"></div>
<script>(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=165955756780515";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">ঈদ সেলামি!</a>


        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="offset3 span6 offset3">

            <?php

            require_once 'class.phpmailer.php';

            $from_name = $_REQUEST['from_name'];
            $from_email = $_REQUEST['from_email'];

            $to_name = $_REQUEST['to_name'];
            $to_email = $_REQUEST['to_email'];

            $message = $_REQUEST['message'];

            $number = ((int)$_REQUEST['amount'] / 1000);

            if (empty($from_name) || empty($from_email) || empty($to_email) || empty($to_name) || empty($message) || empty($number))
            {
                echo "সব গুলো ঘর পূরণ না করলে সেলামি পাঠানো সম্ভব নয়!";
            }
            else
            {
                sendSelami(array("email" => $to_email, "name" => $to_name), array("email" => $from_email, "name" => $from_name), $subject, $message, $number);
            }

            function sendSelami($to, $from, $subject, $message, $number)
            {
                $html = '<html><head></head <body>' . nl2br($message) . '<br><br><br><hr>';

                for ($i = 0; $i < $number; $i++)
                {
                    $html .= ' <br><img src="1000BDT.jpeg" alt="Image" /><br>';
                }

                $html .= '<br><br><a href="http://masnun.com/eid-selami">Send your selami!</a></body></html>';

                $mail = new PHPMailer(); // defaults to using php "mail()"
                $mail->IsSendmail(); // telling the class to use SendMail transport
                $html = eregi_replace("[\]", '', $html);
                $mail->SetFrom($from['email'], $from['name']);
                $mail->AddAddress($to['email'], $to['name']);
                $mail->Subject = "Your Eid Selami!";
                $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
                $mail->MsgHTML($html);
                $mail->AddAttachment("1000BDT.jpeg"); // attachment
                if (!$mail->Send())
                {
                    echo "<h1> সেলামি পাঠানো সম্ভব হয়নি, কারণ: " . $mail->ErrorInfo . "</h1>";
                }
                else
                {
                    echo "<h1>সেলামি পৌছে গেছে!</h1>";
                }


            } ?>
        </div>
    </div>
    <div class="row">
        <br/><br/><br/>
    </div>
    <div class="row">
        <div class="offset3 span6 offset3">
            <div class="fb-like" data-href="http://masnun.com/eid-selami/" data-send="true" data-width="450"
                 data-show-faces="true"></div>
        </div>
    </div>


</div>
</body>
</html>