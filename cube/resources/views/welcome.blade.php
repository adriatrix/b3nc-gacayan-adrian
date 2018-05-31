<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Adrian's Cube</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
          html, body {
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 400;
            height: 100vh;
            margin: 0;
          }

          html {
            background-image: url("img/cube.jpg");
            height: 100%;
            background-position: center center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: dimgrey;
          }

          .title {
            font-size: 5em;
          }

          .links > a {
            background: rgba(0, 25, 50, 0.5);
            border: 1px dashed #ccc;
            color: #ccc;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: .3rem;
            padding: 15px 50px;
            text-decoration: none;
            text-transform: uppercase;
          }

          .links > a:hover {
            background: rgba(0, 25, 50, 0.8);
            border: 1px dashed #fff;
            box-shadow: 0 0 5px #fff;
            color: #fff;
          }

          .m-b-md {
            margin-bottom: 30px;
          }

          .my-content {
            text-align: center;
            position: fixed;
            bottom: 5%;
            left: 0;
            background: rgba(0, 0, 0, 0);
            color: #f1f1f1;
            width: 100%;
            padding: 80px 0 80px 0;
          }

        </style>
    </head>
    <body>
      <div class="my-content">
        <div class="title m-b-md">
          Adrian's Cube X
        </div>
        <div class="links">
          <a class="text-light" href="/home">Enter Site</a>
        </div>
      </div>
    </body>
</html>
