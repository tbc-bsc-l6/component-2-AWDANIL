<div class="p-4 border rounded shadow-sm bg-white">
    <h2 class="font-bold text-lg">{{ $player->name }}</h2>
    <p><strong>Role:</strong> {{ $player->role }}</p>
    @if ($player->team)
        <p><strong>Team:</strong> {{ $player->team->name }}</p>
    @endif
</div>
