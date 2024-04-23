<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('link_css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title> Study hub - @yield('title') </title>

</head>


<body class="antialiased" >


        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
        @endif

        @yield('container')

        <footer style="position: fixed; bottom: 0; width: 100%; background-color: #f8f9fa; padding: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @yield('footer_content')

                    </div>
                </div>
            </div>
        </footer>
</body>

</html>
