<head>
    <link rel="stylesheet" href="{{ asset('/css/partials/styles_footer.css') }}">
</head>
<footer class="text-muted   py-1" id="footer">
    <div class="container" id="divfooter">

        <div class="extended">
            <div class="extended-inf  extended-cur" id = "divfooter">
                <b>{{__('messages.currency_exchange')}}</b>
                <table>
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th>Currency</th>--}}
{{--                        <th>Buy Rate</th>--}}
{{--                        <th>Sale Rate</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
                    <tbody>
                    @foreach ($exchangeRates as $currency)
                        <tr>
                            <td>{{ $currency['ccy'] }}&nbsp&nbsp&nbsp</td>
                            <td>{{ round($currency['buy'],2) }}&nbsp&nbsp</td>
                            <td>{{ round($currency['sale'],2) }}&nbsp&nbsp</td>
                        </tr>
                  @endforeach
                    </tbody>
                </table>
            </div>
            <div class="extended-inf" id = "divfooter">
                <b>{{__('messages.current_weather')}}</b>
                    <p>{{__('messages.temperature')}}: {{ $weatherData['current_weather']['temperature'] }}°C &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                        {{__('messages.wind_speed')}}: {{ $weatherData['current_weather']['windspeed'] }} {{__('messages.velocity')}}</p>
{{--                    <p>Wind Speed: {{ $weatherData['current_weather']['windspeed'] }} km/h</p>--}}
{{--                    <p>Time: {{ $weatherData['current_weather']['time'] }}</p>--}}
                    <p>{{__('messages.sunrise')}}: {{ $sunrise }} &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp {{__('messages.sunset')}}: {{ $sunset }}</p>
{{--                    <p>Sunrise: {{ $sunrise }}</p>--}}
            </div>
        </div>
        <p class="float-end mb-1">
           <b>
               <a href="#" style="font-size: 20px">{{__('messages.to_top')}}</a>
           </b>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap,  &copy; PHP,  &copy; Laravel</p>
    </div>
</footer>
