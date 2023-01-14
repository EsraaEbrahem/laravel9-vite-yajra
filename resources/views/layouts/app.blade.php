<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css','resources/sass/app.scss', 'resources/js/app.js' ])
</head>
<body>
<div id="app">
    @include('layouts.header')
    <div class="container-fluid py-5 vh-100">
        @yield('content')
    </div>
</div>
@include('layouts.footer')
@stack('scripts')

<script type="text/javascript">
    var session_id = "{!! (Session::getId())?Session::getId():'' !!}";
    var user_id = "{!! (Auth::guard('subscriber')->user())?Auth::guard('subscriber')->user()->id:'' !!}";

    // Initialize Firebase
    var config = {
        apiKey: "firebase.api_key",
        authDomain: "firebase.auth_domain",
        databaseURL: "firebase.database_url",
        storageBucket: "firebase.storage_bucket",
    };
    firebase.initializeApp(config);

    var database = firebase.database();

    if({!! Auth::guard('subscriber')->user() !!}) {
        firebase.database().ref('/users/' + user_id + '/session_id').set(session_id);
    }

    firebase.database().ref('/users/' + user_id).on('value', function(snapshot2) {
        var v = snapshot2.val();

        if(v.session_id != session_id) {
            toastr.warning('Your account login from another device!!', 'Warning Alert', {timeOut: 3000});
            setTimeout(function() {
                window.location = '/login';
            }, 4000);
        }
    });
</script>

</body>
</html>
