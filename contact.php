<?php session_start(); ?>
<?php require("botdetect.php"); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel ="stylesheet" type = "text/css" href="assets/css/style.css">
    <link type="text/css" rel="Stylesheet" 
    href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

    <title>Bryan's Portfolio</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bryan Jerger's Portfolio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="portfolio.html">Portfolio</a>
                      
            </li>
      
            <li class="nav-item active">
              <a class="nav-link" href="contact.php">Contact</a>
                      
            </li>
            
          </ul>
          
          
        </div>
      </nav>   

      <div class="containerForm">
    
        
      
          <div class="card text-white bg-dark mb-3" style="width: 40rem;">
          <div class="card-header" id="card-title">Contact Me!</div>
          <div class="card-body">
            
            
          
  <form
    class="contact-form"
    action="contactform.php"
    method="post"
>
  
    <input type="text" name="name" id="name" placeholder= "Full name">
</br>
    <input type="text" name="mail" id="email" placeholder= "E-mail">
</br>
    <input type="text" name="subject" id="subject" placeholder= "Subject">
</br>
    <textarea name="message" id="userMessage" placeholder= "Message"></textarea>
</br>
    <label for="CaptchaCode">Retype the characters from the picture:
    </label>

    <?php // Adding BotDetect Captcha to the page 
    $ExampleCaptcha = new Captcha("ExampleCaptcha");
    $ExampleCaptcha->UserInputID = "CaptchaCode";
    echo $ExampleCaptcha->Html(); 
    ?>

    <input name="CaptchaCode" id="CaptchaCode" type="text" />
</br>

    <button class="btn btn-primary" name="submit" type="submit">Send</button>
    
</form>

<?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($fullUrl, "captchaValid=false")== true) {
      echo  "<p class='error'>You entered the wrong captcha! Try Again!</p>";
      exit();
    }
          
    elseif (strpos($fullUrl, "mailsent")== true) {
        echo  "<p class='success'>Message sent!</p>";
        exit();
    }

?>
            
           
          </div>
        </div>
  
      </div> 
 
        
  <div class="wrapper">

                  
    <div class="push"></div>
  </div>
  <footer class="footer">Copyright &copy; 2019 Bryan Jerger</footer>

  
        
    </body>
</html>