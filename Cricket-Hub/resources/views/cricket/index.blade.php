@if(isset($error))
    <p>{{ $error }}</p>
@else
    @foreach($matches['data'] ?? [] as $match)
        <div>
            <h3>{{ $match['name'] ?? 'Unknown Match' }}</h3>
            <p>{{ $match['dateTimeGMT'] ?? 'No Date' }}</p>
            <p>Status: {{ $match['status'] ?? 'No Status' }}</p>
        </div>
    @endforeach
@endif
