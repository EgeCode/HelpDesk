<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    @livewireStyles
    <style>
        .input-form {
            border: 1px solid gray;
            outline: none;
            padding: 2px 10px 2px 10px;
            border-radius: 3px;
        }

        #table-tickets tbody tr {
            cursor: pointer;
        }

        #content-tickets {
            overflow-x: auto;
        }

        #table-tickets td {
            width: 250px;
        }

        table th {
            background-color: #012E69 !important;
            color: #FFF;
        }

        #table-tickets th,
        td {
            padding-right: 25px !important;
        }

        .navbar {
            background-color: #012E69 !important;
        }

        .btn.btn-secondary {
            background-color: #00BDC6;
            border: none;
        }

        .btn.btn-primary {
            background-color: #012E69;
            border: none;
        }

        .bg-primary {
            background-color: #012E69 !important;
        }

        .bg-secondary {
            background-color: #00BDC6 !important;
        }
    </style>
</head>

<body>
    @component('navigation')
    @endcomponent
    <br>
    {{$slot}}
    @component('toasts')
    @endcomponent


    @livewireScripts
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        document.addEventListener('alerta', event => {
            $('.toast-body').html(event.detail.msg)
            $('#msg-toast').toast('show')
        })
    </script>
    @stack('custom-scripts')
</body>

</html>