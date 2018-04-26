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

        .full-height {
          height: 100vh;
        }

        .flex-center {
          align-items: center;
          display: flex;
          justify-content: center;
        }

        .position-ref {
          position: relative;
        }

        .top-right {
          position: absolute;
          right: 10px;
          top: 18px;
        }

        .title {
          font-size: 5em;
        }

        .links > a {
          color: #fcfcfc;
          font-size: 14px;
          font-weight: 600;
          letter-spacing: .3rem;
          text-decoration: none;
          text-transform: uppercase;
          border: 1px dashed grey;
          background: rgba(0, 75, 141, 0.5);
          padding: 2px 5px;
        }

        .m-b-md {
          margin-bottom: 30px;
        }

          #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100vw;
            min-height: 100vh;
            /* filter: grayscale(100%); */
            /* filter: blur(5px); */
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

          /* Style the button used to pause/play the video */
          #myBtn {
            position: fixed;
            right: 0;
            top: 0;
            width: 100px;
            font-size: 18px;
            padding: 5px;
            border: none;
            /* background: #000; */
            background: rgba(0, 0, 0, 0.3);
            color: #fff;
            cursor: pointer;
          }

          #myBtn:hover {
            background: #ddd;
            color: black;
          }



          @media only screen and (max-width: 800px) {
            html {
              background-image: url("img/cube.jpg");
              height: 100%;
              background-position: center center;
              background-attachment: fixed;
              background-repeat: no-repeat;
              background-size: cover;
              background-color: dimgrey;
            }
            #myVideo {
              display: none;
            }

            .title {
              font-size: 4em;
            }

            .my-content {
              width: 100%;
              left: 0;
              background: rgba(0, 0, 0, 0);
            }

            #myBtn {
              display: none;
            }
          }

        </style>
    </head>
    <body>
      <div class="video-container">
        <video autoplay muted loop id="myVideo">
          <source src="img/cube.webm" type="video/webm">
          <source src="img/cube.mp4" type="video/mp4">
        </video>
      </div>
        <div class="my-content">
          <div class="title m-b-md">
            Adrian's Cube
          </div>
          <div class="links">
            <a class="text-light" href="/home">Enter Site</a>
          </div>
          <!-- Use a button to pause/play the video with JavaScript -->
        </div>
        <button id="myBtn" onclick="myFunction()">Pause</button>
      <script>
        // Get the video
        var video = document.getElementById("myVideo");

        // Get the button
        var btn = document.getElementById("myBtn");

        // Pause and play the video, and change the button text
        function myFunction() {
            if (video.paused) {
                video.play();
                btn.innerHTML = "Pause";
            } else {
                video.pause();
                btn.innerHTML = "Play";
            }
        }
        </script>
    </body>
</html>
