<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
//        //Paginator::useBootstrapFour();

//        View::composer('partials.footer', function ($view) {
//            $response = Http::get('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
//            $exchangeRates = $response->json();
//
//            $view->with('exchangeRates', $exchangeRates);
//        });


        View::composer('partials.footer', function ($view) {
            $ipApiResponse = Http::get('http://ip-api.com/json/');
            $ipApiResponse = $ipApiResponse->json();

            $latitude = $ipApiResponse['lat'];
            $longitude = $ipApiResponse['lon'];

            $weatherResponse = Http::get("https://api.open-meteo.com/v1/meteofrance?latitude=$latitude&longitude=$longitude&current_weather=true&timezone=GMT&daily=sunrise,sunset,temperature_2m_min,temperature_2m_max,precipitation_sum");
            $weatherData = $weatherResponse->json();

            $response = Http::get('https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5');
            $exchangeRates = $response->json();

            // Get the current date in 'Y-m-d' format
            $currentDate = Carbon::now()->format('Y-m-d');

            // Extract sunrise and sunset times for the current date
            $sunrise = $weatherData['daily']['sunrise'][0];
            $sunset = $weatherData['daily']['sunset'][0];

            $view->with('weatherData', $weatherData);
            $view->with('sunrise', $sunrise);
            $view->with('sunset', $sunset);
            $view->with('exchangeRates', $exchangeRates);
        });

    }
}
