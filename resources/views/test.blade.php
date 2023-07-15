<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


    <example-component></example-component>
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach

        <li>

        </li>
    </ul>
    <form action="{{route('user.logout')}}" method="post">
        @csrf
        <input type="submit" value="{{Auth::user()->name .' logout'}}"/>
    </form>
    <h1> Test Translation {{__('messages.welcome')}}</h1>

    <!-- <script src="{{asset('js/app.js')}}"></script> -->

</body>
</html>
