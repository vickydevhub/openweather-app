## Laravel 10 Application - CRUD Operations and Weather API
This repository contains a Laravel 10 application with CRUD operations for managing cities and a REST API to fetch weather data using the OpenWeather API. It also includes test cases using unit tests and a resource for API responses.

## Weather Service
A WeatherService.php file has been created in the app\Services directory. This service is responsible for interacting with the Open Weather API to fetch weather data.

## Configuring Open Weather API Key
To use the Open Weather API, you need to configure your API key in the config/services.php file. Open the file and add the following code at the bottom, replacing YOUR_API_KEY with your actual Open Weather API key:

## Resource
A resource called WeatherResource has been created to format the weather data for API responses. This resource can be found in the app\Http\Resources directory.

## Tests
Several test cases have been created to ensure the functionality of the application.

## CityTest
The CityTest class, located in the tests\Unit directory, contains unit tests for the CRUD operations of the City resource.

## WeatherAPITest
The WeatherAPITest class, also located in the tests\Unit directory, includes unit tests for the weather API endpoints.

## ThrottlingTest
The ThrottlingTest class, found in the tests\Unit directory as well, contains unit tests to verify the API throttling functionality.

To run all the tests, execute the following command:

```console
php artisan test
```

## Run migration 

```console
php artsian migrate
```

## Run seeder

```console
php artisan db:seed --class=CitySeeder
```

## Running the Application
To run the Laravel application, use the following command:
 
```console 
php artisan serve
```

## API Endpoints
The application provides the following API endpoints:

Fetch weather info for all cities: /api/v1/weather

Fetch weather info for a single city: /api/v1/weather/{city}

Please note that you should replace {city} with the actual name of the city you want to retrieve weather information for.
 
Usage
To use this application, follow the steps below:

Clone the repository.
Update your Open Weather API key in the .env file.
Run the necessary migrations and seed the database with sample data.
Run the tests to ensure the application is functioning correctly.
Start the application using php artisan serve.
Access the API endpoints mentioned above to interact with the application.
Enjoy using the Laravel 10 application with CRUD operations for cities and weather data retrieval from the OpenWeather API!

![image](https://github.com/vickydevhub/openweather-app/assets/5188988/4af6ff32-8b61-4398-ba85-fd54a3f8c36e)
![image](https://github.com/vickydevhub/openweather-app/assets/5188988/dc74cda0-b4ad-4dd3-9c5f-9bf5811ace5e)
![image](https://github.com/vickydevhub/openweather-app/assets/5188988/79038d44-e738-4158-a3db-1ebc7e76da80)
![image](https://github.com/vickydevhub/openweather-app/assets/5188988/77d2d181-ad37-42d8-b93f-035713d437ba)
![image](https://github.com/vickydevhub/openweather-app/assets/5188988/36254007-e849-444a-a3b4-c21f3255d360)
