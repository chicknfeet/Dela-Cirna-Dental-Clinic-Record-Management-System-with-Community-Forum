@extends('layout.app')

@section('content')
    <Style>
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
            margin-top: 5rem;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .landingpage a{
            float: right;
            margin-right: 3rem;
            font-size: 18px;
        }
        
        .buttons{
            text-align: center;
        }

        .buttons a {
            text-decoration: none;
            display: inline-flex;
        }
    </Style>
    
    <form action="{{route('login.submit')}}" method="post">

        <div class="buttons">
            <a href="{{ route('login') }}"><h3>LOGIN</h3></a>
            <a href="{{ route('registration') }}"><h3>SIGNUP</h3></a>
        </div>
        
        @csrf
        <div>
            <label for="user_type">User Type</label>
            <select id="user_type" name="user_type">
                <option value="admin">Admin</option>
                <option value="patient">Patient</option>
                <option value="dentistrystudent">Dentistry Student</option>
            </select>
        </div>
        <div>
            <label for="username">
                @error('username')
                    <span style="color:red">{{$message}}</span>
                @enderror
            </label>
            <input type="text" name="username" id="username" placeholder="Username" required>
        </div>
        <div>
            <label for="password">
                @error('password')
                    <span style="color:red">{{$message}}</span>
                @enderror
            </label>
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <br>
        <div>
            <button>Login</button>
        </div>
    </form>
@endsection

@section('title')
    Login Page
@endsection
