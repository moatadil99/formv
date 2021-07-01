<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container"> 
    <form class="form-signin text-center" style="max-width: 50%!important;" method="post" id="myForm">
      
      <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
        <label>Enter your details to create your account</label>
        <?php  echo "<div class='text-danger' >".($this->session->flashdata('msg'))."</div>";  ?>

      <div class="form-floating my-2">
        <input type="text" name="user_name" class="form-control " value= "<?= set_value('user_name') ?>" id="floatingInput" placeholder="Fullname">
        <label for="floatingInput">User Name</label>
        <?= form_error('user_name'); ?>
      </div>
      <div class="form-floating my-2">
        <input type="text" name="email" class="form-control" value= "<?= set_value('email') ?>" id="floatingInput" placeholder="Email">
        <label for="floatingInput">Email</label>
        <?= form_error('email'); ?>
      </div>
      <div class="form-floating my-2">
        <input type="password" name="password" class="form-control" value= "<?= set_value('password') ?>" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        <?= form_error('password'); ?>
      </div>
      <div class="form-floating my-2">
        <input type="password" name="cpassword" class="form-control" value= "<?= set_value('cpassword') ?>" id="floatingPassword" placeholder="confirm Password">
        <label for="floatingPassword">confirm Password</label>
                <?php  echo "<div class='text-danger' >".($this->session->flashdata('match'))."</div>";  ?>

        <?= form_error('cpassword'); ?>

      </div>
      <div class="checkbox mb-3 my-2">
        <label>
          I Agree the terms and conditions <input type="checkbox" name="check" checked value="remember-me">
        <?= form_error('check'); ?>
        </label>
      </div>
      <div class="row">
        <button class="w-100 btn btn-lg btn-primary col mx-1" type="submit">Sign in</button>
        <button type="button" class="btn btn-secondary col mx-1" id="clear">Cancel</button>
      </div>
      

    </form>
  </div>
  </body>
</html>
<script type="text/javascript">

  $(document).ready(function(){
      $("#clear").click(function(){
          $("#myForm").trigger("reset");
      });
  });
</script>
<script type="text/javascript">
  <?php   

        if($_SESSION['activation']=="true")
          {
            ?>
           alert(" the account is activate");
          <?php
            $this->session->set_flashdata('activation', 'false');
          }
          else
          {
             ?>
           alert($_SESSION['activation']);
          <?php
          }

           echo($this->session->flashdata('msg'));
                    

    ?>
</script>