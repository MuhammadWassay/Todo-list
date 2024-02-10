<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <!-- Include Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ url('assets/modules/fontawesome/css/all.min.css') }}"
        />

        <!-- CSS Libraries -->
        <!-- CSS Libraries -->
        <link
            rel="stylesheet"
            href="{{ url('assets/modules/datatables/datatables.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{
                url(
                    'assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'
                )
            }}"
        />
        <link
            rel="stylesheet"
            href="{{
                url(
                    'assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css'
                )
            }}"
        />
        <link
            rel="stylesheet"
            href="{{ url('assets/modules/select2/dist/css/select2.min.css') }}"
        />

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
        <link rel="stylesheet" href="{{ url('assets/css/components.css') }}" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    </head>
    <body>
        @include('navbar')

        <div class="">@yield('content')</div>

        <!-- Include Bootstrap JavaScript -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
