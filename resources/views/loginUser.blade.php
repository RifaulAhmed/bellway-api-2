<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
    <div class="container">

    <!-- @if(session()->has('success'))
    <div class="alert alert-success">
        <p>{{session()->get('success')}}</p>
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        <p>{{session()->get('error')}}</p>
    </div>
    @endif -->

        <h2 class="mt-5">Welcome to MealsHub!!</h2>
        <form action="{{URL::to('loginUser')}}" method="POST" class="mt-4">
           
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <!-- <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="phone" id="phone" name="phone" class="form-control" required>
            </div> -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
         
            <button type="submit" name="loginUser" class="btn btn-primary">Login</button>
        </form>
    </div>
    <!-- Bootstrap JS (optional, for certain components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
