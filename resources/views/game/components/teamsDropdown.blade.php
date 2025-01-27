<select name="{{ $selectionId }}" id="{{ $selectionId }}" style="background: rgba(13, 20, 30, 0.5)">
    @foreach($teams as $team)
        <option value="{{ $team->id }}">{{ $team->name }}</option>
    @endforeach
</select>
