<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login and Register</title>
<style>
  body {
    font-family: Arial, sans-serif;
    text-align: center;
  }

  .btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .btn:hover {
    background-color: #555;
    color: #fff;
  }

  .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: 1px solid #007bff;
  }

  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  .btn-success {
    background-color: #28a745;
    color: #fff;
    border: 1px solid #28a745;
  }

  .btn-success:hover {
    background-color: #218838;
    border-color: #218838;
  }
</style>
</head>
<body>
  <h1>Login and Register</h1>
  <a href="login" class="btn btn-primary">Login</a>
  <a href="register" class="btn btn-success">Register</a>
  <p class="register-text">If you are a new user, register first and then login.</p>
</body>
</html>
