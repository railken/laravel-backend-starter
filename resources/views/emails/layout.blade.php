<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css'>
        <style>
            html,
            body {
                margin: 0;
                border: 0;
                background-color: #E0E0E0;
            }

            main {
                background-color: white;
                max-width: 768px;
                width: 90%;
                margin: 50px auto;
                box-shadow: 0 1px 3px 0 rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 2px 1px -1px rgba(0,0,0,.12);
            }

            h1 {
                font-family: 'Montserrat', sans-serif;
                font-weight: normal;
                text-align: center;
                color: white;
            }

            .title {
                padding: 20px 0;
                background: #3d3d47;
            }

            .content {
                padding: 25px 40px;
                background-color: white;
            }
            p,
            a,
            span {
                color: #333;
                font-size: 18px;
                font-family: 'Montserrat', sans-serif;
                line-height: 1.75;
            }

            @media  all and (max-width: 1023px) {
                main {
                    margin: 5% 5%;
                }
            }
            .btn-primary {
                display: block;
                background: #505061;
                padding: 15px 25px;
                margin: 20px auto;
            }
            
            .btn {
                outline: none;
                border: none;
                border-radius: 0;
                text-decoration: none;

            }

            .btn-primary:hover {
                background-color: #505061;
            }


            .btn-primary:active, .btn-primary:focus {
                background-color: #676777 !important;
                box-shadow: 0 0 0 0.2rem rgba(136, 127, 179, 0.50) !important;
            }

            .fluid {
                display: flex;
            }

            .fluid-center {
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body>
        <main>
            @yield('main')    
        </main>
    </body>
</html>