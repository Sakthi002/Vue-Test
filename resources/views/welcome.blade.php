<!doctype html>

    <head>
       
        <meta charset="utf-8">

        <base href="{{url('/')}}">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="api-base-url" content="{{ url('/') }}" />
       
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tweebr</title>

        <link rel="shortcut icon" href="https://lh5.googleusercontent.com/p/AF1QipOwzgHk0tUbVkWJsQZ6MF4-UcCKK_DDdxsRwn8A=w160-h160-k-no">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <link href="{{asset("css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css"/>

        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

        <script src="{{asset('js/jquery2.1.1.min.js')}}" type="text/javascript"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="{{asset('js/select2.full.min.js')}}"></script>

    </head>

    <body>

        <div id="app">

            <!-- my vue component rendering here -->
            <profile-component></profile-component>

        </div>

        <script>

            window.Laravel =  <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

        </script>

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    </body>

</html>
