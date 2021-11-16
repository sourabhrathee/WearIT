<?php
    session_start();
?>

<html>
  <head>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="../static/style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"
    ></script>
    <style>
      body {
        background-image: url("../static/bg_6.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        /*background-color: #cccccc;*/
      }
    </style>
    <script>
      $(document).ready(function () {
        $("#company").change(function () {
          var company = $("#company").val();
          console.log(company);
          // Make Ajax Request and expect JSON-encoded data
          $.getJSON(
            "http://127.0.0.1:1212/get_models" + "/" + company,
            function (data) {
              // Remove old options
              $("#models").find("option").remove();

              // Add new items
              $.each(data, function (key, val) {
                var option_item =
                  '<option value="' + val + '">' + val + "</option>";
                $("#models").append(option_item);
              });
            }
          );
        });
      });
    </script>
    <title>Virtual Trial Room</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/"><strong>WearIt</strong></a>
        </div>
        <!--<ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="modal" data-target="#myModal">Predict</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="shirt.html">Shirts</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="shirt.html">Pants</a></li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                </ul>-->
      </div>
    </nav>
    <div class="container">
      <form
        class="form-inline"
        action="http://127.0.0.1:5000/predict"
        method="post"
      >
        <select name="shirt" class="form-control" id="company">
          <option value="0" selected="selected">Select a t-shirt</option>
          <option value="1">Orange t-shirt</option>
          <option value="2">Green t-shirt</option>
          <option value="3">White t-shirt</option>
          <option value="4">Black t-shirt</option>
        </select>
        <button type="submit" class="btn btn-default">Try</button>
      </form>
      <!--<form class="form-inline" action="http://127.0.0.1:5000/predict" method="post">
        <select name="gender" class="form-control" id="company">
          <option value="0" selected="selected">Select gender</option>
          <option value="1">Male</option>
          <option value="2">Female</option>
        </select>
        <button type="submit" class="btn btn-default">Try</button>
      </form>-->
      <div class="row">
        <div class="col-md-3">
          <figure>
            <img src="../static/shirt_1.png" class="thumbnail" />
            <figcaption>Orange t-shirt</figcaption>
          </figure>
        </div>
        <div class="col-md-3">
          <figure>
            <img src="../static/shirt_2.jpg" class="thumbnail" />
            <figcaption>Green t-shirt</figcaption>
          </figure>
        </div>
        <div class="col-md-3">
          <figure>
            <img src="../static/shirt_3.jpg" class="thumbnail" />
            <figcaption>White t-shirt</figcaption>
          </figure>
        </div>
        <div class="col-md-3">
          <figure>
            <img src="../static/shirt_4.jpg" class="thumbnail" />
            <figcaption>Black t-shirt</figcaption>
          </figure>
        </div>
      </div>
    </div>
  </body>
</html>