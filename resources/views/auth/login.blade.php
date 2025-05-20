<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <title>Login Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
        }
        body{
          min-height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
          background: #4070f4;
        }
        .wrapper{
          position: relative;
          max-width: 430px;
          width: 100%;
          background: #fff;
          padding: 34px;
          border-radius: 6px;
          box-shadow: 0 5px 10px rgba(0,0,0,0.2);
        }
        .wrapper h2{
          position: relative;
          font-size: 22px;
          font-weight: 600;
          color: #333;
          margin-bottom: 30px;
        }
        .wrapper h2::before{
          content: '';
          position: absolute;
          left: 0;
          bottom: 0;
          height: 3px;
          width: 28px;
          border-radius: 12px;
          background: #4070f4;
        }
        form .input-box{
          height: 52px;
          margin: 18px 0;
        }
        form .input-box input{
          height: 100%;
          width: 100%;
          outline: none;
          padding: 0 15px;
          font-size: 17px;
          font-weight: 400;
          color: #333;
          border: 1.5px solid #C7BEBE;
          border-bottom-width: 2.5px;
          border-radius: 6px;
          transition: all 0.3s ease;
        }
        .input-box input:focus,
        .input-box input:valid{
          border-color: #4070f4;
        }
        .input-box.button input{
          color: #fff;
          letter-spacing: 1px;
          border: none;
          background: #4070f4;
          cursor: pointer;
          height: 45px;
          border-radius: 6px;
          font-size: 18px;
          font-weight: 600;
          margin-top: 15px;
          transition: background 0.3s ease;
        }
        .input-box.button input:hover{
          background: #0e4bf1;
        }
        .error-message {
          margin-bottom: 15px;
          color: #ff4d4f;
          font-weight: 600;
          background: #ffd6d9;
          padding: 10px;
          border-radius: 6px;
        }
        .text {
          margin-top: 20px;
          text-align: center;
          font-size: 14px;
          color: #707070;
        }
        .text a {
          color: #4070f4;
          text-decoration: none;
          font-weight: 600;
        }
        .text a:hover {
          text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login Admin</h2>

        @if ($errors->any())
        <div class="error-message">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ url('login') }}">
            @csrf
            <div class="input-box">
                <input type="email" name="email" placeholder="Enter your email" required autofocus />
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Enter your password" required />
            </div>
            <div class="input-box button">
                <input type="submit" value="Login" />
            </div>
        </form>

        <div class="text">
            <h3>Don't have an account? <a href="{{ route('register') }}">Register now</a></h3>
        </div>
    </div>
</body>
</html>
