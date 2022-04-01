<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <title>Revista Tocantins Indústria - Sistema Fieto</title>

    <style>

        html, body {
            margin-bottom: 50px;
        }

        #container > div {
            width: 300px;
            height: 280px;
            background-color: antiquewhite;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            margin-top: 50px;
        }

        #container .first {
            height: 400px;
        }

        #container img {
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .card-title {
            position: absolute;
            bottom: 0;
            text-align: center;
            width: 100%;
            color: #fff;
            background: linear-gradient(to bottom,rgba(0,0,0,0) 0%,rgba(0,0,0,1) 100%);
            margin-bottom: 0 !important;
        }

        .card-title span {
            font-size: 1.8em;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="">  

        <div class=""  style="background-color: #ababab;text-align: center;">            
            <img src="{{ asset('assets/img/top_logo.png') }}" alt="" style="height: 168px;">            
        </div>

        <div class="" id="container">
            @foreach ($revistas as $revista)
                <div class="{{ $revista->indice == 1 ? 'first' : '' }}" onclick="openRevista({{ $revista->id }})">
                    <img src="{{ Storage::url($revista->thumbnail) }}" alt="Revista">                                  
                </div>
            @endforeach        
        </div>

           
    </div>

<script src="https://unpkg.com/magic-grid/dist/magic-grid.min.js"></script>
<script>

    let magicGrid = new MagicGrid({
        container: "#container", // Required. Can be a class, id, or an HTMLElement.
        animate: true,
        gutter: 30,
        static: true,
        useMin: true
    });
    
    magicGrid.listen();

    function openRevista(id) {
        window.open('/revistas/visualizar/' + id, '_blank');
    }

</script>
</body>
</html>