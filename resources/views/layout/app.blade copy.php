<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Dental Record Management System with Community Forums</title> -->
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <Style>
        body {
            font-family: "Lato", sans-serif;
        }


        .sidenav {
            width: 150px; /* Adjust as needed */
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            /* background-color: #f8f9fa; Adjust background color as needed */
            background-color: #dee2e6; /* Background color of navigation links */
            overflow-y: auto;
            /* transition: width 0.3s ease; */
            transition: width 0.5s ease;
            padding-top: 50px;
            width: 0;

            /* height: 100%; */
            z-index: 1;
            /* overflow-x: hidden; */
        }

        .sidenav a {
            padding: 10px 15px;
            display: block;
            color: #333; /* Adjust link color as needed */
            text-decoration: none;


            font-size: 18px;
            transition: 0.5s;
        }

        .sidenav a:hover {
            background-color: #e9ecef; /* Adjust hover background color as needed */
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 18px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        h1 {
            text-align: center;
        }
        h3 {
            font-size: 17px;
            font-weight:800;
            text-align: center;
        }
    </Style>
    
    <header>
        <nav>
            <div id="mySidenav" class="sidenav">

                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                
                @if(auth()->check())
                    @if(session('user_type') === 'admin')
                        <a href="{{route('patientlist')}}">Patient List</a>
                        <a href="{{route('messages')}}">Messages</a>
                        <a href="{{route('paymentinfo')}}">Payment Info</a>
                        <a href="{{route('calendar')}}">Calendar</a>
                        <a href="{{route('communityforum')}}">Community Forum</a>
                        <a href="{{route('logout')}}">Log Out</a>   
                        <!-- Add other admin links here -->
                    @elseif(session('user_type') === 'patient')
                        <a href="{{ route('appointment') }}">Appointment</a>
                        <a href="{{ route('messages') }}">Messages</a>
                        <a href="{{ route('paymentinfo')}}">Payment Info</a>
                        <a href="{{ route('calendar')}}">Calendar</a>
                        <a href="{{ route('communityforum')}}">Community Forum</a>
                        <a href="{{ route('logout')}}">Log Out</a>
                        <!-- Add other patient links here -->
                    @elseif(session('user_type') === 'dentistrystudent')
                        <a href="{{ route('communityforum') }}">Community Forum</a>
                        <a href="{{ route('logout')}}">Log Out</a>
                    @endif
                @else
                    <a href="{{route('login')}}">Login</a>
                @endif
            </div>    
        </nav>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    </header>

    @yield('content')

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "150px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>