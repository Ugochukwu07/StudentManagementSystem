<!DOCTYPE html>
<html lang="en" style="height: 100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@400;700&display=swap');

        #email-body {
            font-family: 'Roboto', sans-serif;
        }
        .email-titles {
            font-family: "Montserrat", Verdana, Arial, sans-serif;
        }

        </style>
</head>
<body id="email-body" style="color: black; background-color: #f5f5f5; font-family: 'Roboto', sans-serif; padding: 0px 10px; max-width: 700px; margin: auto; padding-top: 10px">
    <header style="padding: 10px 3px;">
        <center>
            <a href="{{ route('login') }}">
                <h1>STUDENT MANAGEMENT SYSYTEM</h1>
            </a>
        </center>
    </header>
    <main>
        @yield('content')
    </main>
    <footer style="margin: 10px 0px;">
        <hr>
        <center>
            <span style="font-size: 12px">{{ date('Y') }}&copy; SMS. NAU Awka</span>
        </center>
    </footer>
</body>
</html>
