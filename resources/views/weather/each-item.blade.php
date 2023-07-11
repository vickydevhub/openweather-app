<td>
    <h2>{{ $date }}</h2>
</td>
<td>{{ $weather['main']['temp'] }} C</td>
<td>{{ Str::ucfirst($weather['weather'][0]['description']) }}</td>