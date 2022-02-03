<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

      <form name=formlogin action="checklogin.php" class="login-form" method="POST" id="login">
        <h1>BACKEND LOGIN</h1>

        <div class="txtb">
          <input type="text" name="a_user">
          <span data-placeholder="Username"></span>
        </div>

        <div class="txtb">
          <input type="password" name="a_pass">
          <span data-placeholder="Password"></span>
        </div>

        <input type="submit" class="logbtn" value="Login">

        <div class="bottom-text">
        You cannot register for <a href="#">account admin</a>
        </div>

      </form>

      <script type="text/javascript">
      $(".txtb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>


  </body>
</html>
