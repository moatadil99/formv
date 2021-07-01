<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      
    
      	<form class="form-signin text-center " style="max-width: 60%!important;" method="post">
        <div class="">
            <h1 class="h3 mb-3 fw-normal">Reset password</h1>
                <?= form_error('password'); ?>
            <div class="form-floating my-2">
              <input type="password" name="password" class="form-control" value= "<?= set_value('password') ?>" id="floatingPassword" placeholder=" New Password">
              <label for="floatingPassword">New Password</label>
              <div class="my-2">password should contain capital later,special charachter and numbers</div>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Confirm</button>
        </div>
      </form>
    </div>
    
  </body>
</html>
