
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT US</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
    *{
      margin: 0;
      padding: 0;
      font-family: 'Times New Roman', Times, serif;
    }
    body{
        margin: 0;
        padding: 0;
        background-image:url(jjj.jpg);
        height: 100vh;
        background-size: cover;
        background-position: center;
    }

    .main ul{
      float: right;
      list-style-type: none;
    }

    .main ul li{
      display: inline-block;
    }
    .logo  ul{
      float: left;
      list-style-type: none;
    }

    .logo ul li{
      font-size: 2.7em;
      font-weight: bold;
      display: inline-block;
      color: #fff;
    }
    ul li a{
      text-decoration: none;
      color: #fff;
      padding: 5px 20px;
      border: 1px solid transparent;
      transition: 0.6s ease;
    }

    ul li a:hover{
      background-color: #fff;
      color: #000;
    }

    ul li.active a{
      background-color: #fff;
      color: #000;
    }

    .logo img{
      /*background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(../ander.jpg);*/
      border: 1px solid transparent;
      float: left;
      width: 50px;
      height: auto;
      
    }
    .main {
    max-width: 1200px;
    margin: auto;
    }

    hr{
        background: white;	
    }
    

	  .contact-form{
       color: white;
        padding: 70px;
        padding-top: 40px;
        background: rgba(0,0,0,.6);
        box-shadow: 15px 0px 10px 3px rgb(206, 201, 201);
        /*background:rgba(0,0,0, .6);
        color:white;
        padding-top: 40px;
        padding: 70px;
        box-shadow: 15px 0px 10px 3px grey;*/
    }
    
    .col-md-6 p{
        font-size: 1.5em;
    }
    .footer-copyright{
    background-color: transparent;
    color: #fff;
    position: fixed;
    right: 0;
    bottom: 0;
    left: 0;
    }

  
</style>
</head>
<body>
  <div class="main">
    <div class="logo">
        <img src="4.png" title="WEATHER SPARKS">
        <ul>
          <li>WEATHER SPARKS</li>
        </ul>  
    </div>
    <ul>               
        <li><a href="index.html">HOME</a></li>
        <li><a href="forcast.html">FORECAST</a></li>
        <li><a href="PREV.html">PAST WEATHER</a></li>
        <li><a href="maps.html">MAPS</a></li>
        <li><a href="ABOUT.html">ABOUT</a></li>
        <li class="active"><a href="#">CONTACT</a></li>
    </ul>
  </div>
  <section>
    <div class="container contact-form">
      <br>
      <h1 style="text-align: center;">CONTACT US</h1>
      <hr>
      
      <div class="row">
        <form id="contact_form" method="post" role="form">
            <div class="messages"></div>
          
            <div class="controls">
          
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_name">Name *</label>
                            <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your name *"  data-error="name is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_email">Email *</label>
                            <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *"  data-error="Valid email is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Message *</label>
                            <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4"  data-error="Please,leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" name="ok" class="btn btn-primary btn-send" value="Send message">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted"><strong>*</strong> These fields are required.</p>
                    </div>
                </div>
            </div>
        </form>
        <?php 
          if(isset($_POST['ok'])){
          include_once 'function1.php';
          $obj=new Contact();
          $res=$obj->contact($_POST);
          if($res==true){
          echo "<script>alert('Message Send Successfully.Thank you')</script>";
          }else{
          echo "<script>alert('Something Went wrong!!')</script>";
          }
          }
        ?>
      </div>

    </div>

  </section>
  <footer>
    <div class="footer-copyright text-center py-3">
        <b>© Copyright 2020.All rights reserved.</b>
    </div>
</footer>

    <!--Jquery-->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="js/formValidation.js"></script>
  <script src="js/bootstrap.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('#contact_form').formValidation({
    message: 'This value is not valid',
    icon: {
    valid: 'glyphicon glyphicon-ok',
    invalid: 'glyphicon glyphicon-remove',
    validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
    name: {
    validators: {
    notEmpty: {
      message: 'The name is required'
    }
    }
    },
    message: {
    validators: {
    notEmpty: {
      message: 'The message is required'
    }
    }
    },
    
    email: {
    validators: {
    notEmpty: {
      message: 'The email address is required'
    },
    emailAddress: {
      message: 'The input is not a valid email address'
    }
    }
    }
    }
    });
    });
  </script>
</body>
</html>

