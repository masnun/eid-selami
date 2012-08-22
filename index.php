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
            <div class="fb-like" data-href="http://masnun.com/eid-selami/" data-send="true" data-width="450"
                 data-show-faces="false"></div>
        </div>
    </div>

    <div class="row">
        <br/>
    </div>

    <div class="row">
        <div class="offset3 span6 offset3">

            <form action="send.php" method="POST">
                আপনার নাম: <br/><input type="text" name="from_name"/> (ইংরেজীতে লিখুন) <br/>
                আপনার ইমেইল ঠিকানা: <br/><input type="text" name="from_email"/> (ইংরেজীতে লিখুন) <br/>

                প্রাপকের নাম:<br/><input type="text" name="to_name"/> (ইংরেজীতে লিখুন) <br/>
                প্রাপকের ইমেইল ঠিকানা: <br/> <input type="text" name="to_email"/> (ইংরেজীতে লিখুন) <br/>

                <br/>

                আমি <select name="amount" style="width: 70px;">
                <option value="1000" selected="selected">1000</option>
                <option value="2000">2000</option>
                <option value="3000">3000</option>
                <option value="4000">4000</option>
                <option value="5000">5000</option>
            </select> টাকা পাঠাতে চাই! <br/><br/>

                বার্তা:<br/> (বাংলা গ্রহনযোগ্য) <br/>

                <textarea rows="7" name="message"></textarea><br/><br/>

                <input type="submit" class="btn btn-success btn-large" value="পাঠান"/>

            </form>
        </div>
    </div>



</div>
</body>
</html>