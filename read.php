<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="Flat-UI-master/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="Flat-UI-master/css/flat-ui.css">
    <link rel="stylesheet" href="css/prettify.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.0.min.js"></script>
    <link href="/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <noscript>
        <style type="text/css">
            .prettyprint{
                color: #FFFFFF;
                padding-left:60px
            }
        </style>
    </noscript>
</head>
<body>
<a class="hidden-xs img-responsive" href="https://github.com/BruceLampson/SmsNicaApi"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png"></a>
<div class="page-container">

<!-- top navbar -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".sidebar-nav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">

            </a>
        </div>
    </div>
</div>

<div class="container">
<!--[if lt IE 8]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<noscript><h1>We recommend enabling JavaScript for a better user experience ;)</h1></noscript>
<img src="/img/smsnica180x180.png" class="img-circle img-responsive"  > <h3 class="hidden-xs">SmsNica::API</h3>
<hr>
<!-- sidebar -->
<div class="row row-offcanvas row-offcanvas-left">
    <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
        <ul class="nav">
            <li><a href=index.php>Introduction</a></li>
            <li><a href="send.php">Send</a></li>
            <li class="active"><a href="read.php">Read</a></li>
            <li><a href="carrier.php">Carrier</a></li>
            <li><a href="error.php">Error</a></li>
        </ul>
    </div>
    <!-- main area -->
    <div class="col-xs-12 col-sm-9">
    <h6>Reading Outbound(s) SMS</h6>

    <p>
        A Message instance resource represents the set of messages sent by an account.
    </p>

    <h6>Request URL:</h6>

    <p>Use the following url for reading your outbound SMS. This method will return a paginated collection of 10 SMS per page.</p>
<pre class="prettyprint">GET|POST https://www.smsnica.com/api/v1/read/outbox/page/:num</pre>
    <p>Use the following url for reading a single outbound SMS based on the requested :id.</p>
<pre class="prettyprint">GET|POST https://www.smsnica.com/api/v1/read/outbox/message/:id</pre>
    <br>
    <h6>Required Parameters:</h6>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 100px;">Name</th>
                <th style="width: 50px;">Type</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>apikey</td>
                <td>string</td>
                <td>Generated by SmsNica and located in your dashboard settings.</td>
            </tr>
            <tr>
                <td>accesstoken</td>
                <td>string</td>
                <td>Generated by SmsNica and located in your dashboard settings.</td>
            </tr>
            <tr>
                <td>num</td>
                <td>numeric</td>
                <td>Page number. If not present default to 1</td>
            </tr>
            <tr>
                <td>id</td>
                <td>numeric</td>
                <td>Message/SMS outbox id. If not present default to 1</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- Nav tabs -->
    <h6>Sample Snippets:</h6>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#php" data-toggle="tab">PHP</a></li>
        <li><a href="#jquery" data-toggle="tab">jQuery.ajax()</a></li>
        <li><a href="#getjson" data-toggle="tab">jQuery.getJSON()</a></li>
        <li><a href="#node" data-toggle="tab">NodeJs</a></li>
        <li><a href="#ruby" data-toggle="tab">Ruby</a></li>
    </ul>
    <br>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="php">
<pre class="prettyprint linenums">
// Get cURL resource
$curl = curl_init();
// Set some options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_URL => 'https://www.smsnica.com/api/v1/read/outbox/page/:num',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => array(
        'accesstoken' => {{accesstoken}},
        'apikey' => {{apikey}},
        'num' => {{num}},
    )
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
</pre>
        </div>
        <div class="tab-pane" id="jquery">
<pre class="prettyprint lang-js linenums">
(function($){
    $.ajax({
        type: 'POST',
        url: 'https://www.smsnica.com/api/v1/read/outbox/message/:id',
        dataType: 'json',
        data: {
            accesstoken: "{{accesstoken}}",
            apikey: "{{apikey}}",
            id => "{{id}}",
        },
        success: function(data){
            console.log(data);
        },
        complete: function(){
            //Implement your logic
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown);
        }
    });
})(jQuery);
</pre>
        </div>
        <div class="tab-pane" id="getjson">
<pre class="prettyprint lang-js linenums">
    (function($){
        $.getJSON( 'https://www.smsnica.com/api/v1/read/outbox/page/:num', {
            accesstoken: "{{accesstoken}}",
            apikey: "{{apikey}}",
            num => "{{num}}",
        })
            .done(function( data ) {
                console.log(data);
            });
    })(jQuery);
</pre>
        </div>
        <div class="tab-pane" id="node">
<pre class="prettyprint lang-js linenums">
var request = require('request'); // https://www.npmjs.org/package/request

var data = {
    url: 'https://www.smsnica.com/api/v1/read/outbox/message/{{id}}',
    form: {
        apikey: '{{apikey}}',
        accesstoken: '{{accesstoken}}'
    }
};

request.post(data, function (err, res, body) {
    console.log('body:', body);
});</pre>
        </div>
        <div class="tab-pane" id="ruby">
<pre class="prettyprint lang-rb linenums">
require "net/https"
require "uri"

uri = URI.parse('https://www.smsnica.com/api/v1/read/outbox/page/:num')

http = Net::HTTP.new(uri.host, uri.port)

request = Net::HTTP::Post.new(uri.request_uri)
request.set_form_data(
        accesstoken: "{{accesstoken}}",
        apikey: "{{apikey}}"
)

response = http.request(request)
</pre>
        </div>
    </div>
    <br>
    <h6>Single Sample Response:</h6>
<pre class="prettyprint linenums">
{
    "transactionStatus": 1,
    "response": "Message sent",
    "processId": "MjEzMA==",
    "number": "50583240355",
    "message": "Hola, cuales son sus horarios de atención al cliente?",
    "carrier": "movistar",
    "credits": 999,
    "dateTime": {
        "date": "2014-04-11 17:46:48",
        "timezone_type": 3,
        "timezone": "America/Managua"
    },
    "code": 200
}
</pre>
    <br>
    <h6>Collection Sample Response:</h6>
<pre class="prettyprint linenums">
{
    "transactionStatus":1,
    "messages":{
        "0":{
            "id":401,
            "number":"50583240355",
            "message":"Envía #dulce y recibiras un postre gratis.",
            "carrier":"movistar",
            "dateTime":{
                "date":"2014-04-10 16:28:07",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"0"
        },
        "1":{
            "id":400,
            "number":"50583240355",
            "message":"Donde será el bacanal esta noche?",
            "carrier":"movistar",
            "dateTime":{
                "date":"2014-04-10 14:44:42",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"1"
        },
        "2":{
            "id":399,
            "number":"50583240355",
            "message":"Les ofrecemlos sandalias brasileñas y accesorios de mano.",
            "carrier":"unknown",
            "dateTime":{
                "date":"2014-04-10 14:42:07",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"1"
        },
        "3":{
            "id":398,
            "number":"50583240355",
            "message":"Cuando empiezan las clases? Me gustaríia saber el horario.",
            "carrier":"claro",
            "dateTime":{
                "date":"2014-04-10 13:55:58",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"0"
        },
        "4":{
            "id":397,
            "number":"50583240355",
            "message":"A que hora cierran? Quisiera visitar su negocio.",
            "carrier":"claro",
            "dateTime":{
                "date":"2014-04-10 13:25:51",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"0"
        },
        "5":{
            "id":396,
            "number":"50583240355",
            "message":"?",
            "carrier":"La reunión sera el día de mañana, a las 2:00 pm. Por favor ser puntual. ",
            "dateTime":{
                "date":"2014-04-10 13:05:12",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"0"
        },
        "6":{
            "id":395,
            "number":"50583240355",
            "message":"Este fin de semana promoción en platos fuertes al 2x1. Aprovechen esta gran promoción.",
            "carrier":"movistar",
            "dateTime":{
                "date":"2014-04-10 12:56:34",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"0"
        },
        "7":{
            "id":394,
            "number":"50583240355",
            "message":"Nueva colección de trajes de baño para damas, descuento por compras de $50 a mas.",
            "carrier":"movistar",
            "dateTime":{
                "date":"2014-04-10 12:51:58",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"0"
        },
        "8":{
            "id":393,
            "number":"50583240355",
            "message":"FAV26C",
            "carrier":"Hoy se estará regalando tragos a las primeras 100 personas que lleguen antes de las 10 pm. ",
            "dateTime":{
                "date":"2014-04-10 12:04:03",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"0"
        },
        "9":{
            "id":392,
            "number":"50583240355",
            "message":"Clases de baile par adultos, a las personas que se inscriban una semana antes les daremos 10% de descuento.",
            "carrier":"unknown",
            "dateTime":{
                "date":"2014-04-10 08:02:30",
                "timezone_type":3,
                "timezone":"America\/Managua"
            },
            "status":"1"
        }
    },
    "paginator":{
        "pageCount":24,
        "itemCountPerPage":10,
        "first":1,
        "current":2,
        "last":24,
        "previous":1,
        "next":3,
        "pagesInRange":{
            "1":1,
            "2":2,
            "3":3,
            "4":4,
            "5":5,
            "6":6,
            "7":7,
            "8":8,
            "9":9,
            "10":10
        },
        "firstPageInRange":1,
        "lastPageInRange":10,
        "currentItemCount":10,
        "totalItemCount":240,
        "firstItemNumber":11,
        "lastItemNumber":20
    },
    "code":200
}
</pre>
    <br>

    </div><!-- /.col-xs-12 main -->
</div>

</div><!--/.page-container-->

<script src="Flat-UI-master/js/jquery-1.8.3.min.js"></script>
<script src="Flat-UI-master/js/bootstrap.min.js"></script>
<script src="Flat-UI-master/bootstrap/js/google-code-prettify/prettify.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript">
    //<!--
    prettyPrint();
    //-->
</script>
<script type="text/javascript">
    //<!--
    $(document).ready(function() { $('[data-toggle=offcanvas]').click(function() { $('.row-offcanvas').toggleClass('active');});});
    //-->
</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
     function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
     e=o.createElement(i);r=o.getElementsByTagName(i)[0];
     e.src='//www.google-analytics.com/analytics.js';
     r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
     ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>
