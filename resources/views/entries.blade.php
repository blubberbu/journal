<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entries</title>
</head>
<body>
    <h2>Entries</h2>
    <div>
        <a href="/logout"><button>Log out</button></a>
    </div>
    <div>
        <a href="/new-entry"><button>New entry</button></a>
    </div>
    <div>
        <h3>{{ $user->name }}'s Journal</h3>
    </div>
    @foreach ($user->entries as $entry)
        <div>
            <div>
                <b>Date:</b> {{ $entry->created_at }}
            </div>
            <div>
                <b>TItle:</b> {{ $entry->title }}
            </div>
            <img src="{{ Storage::url($entry->image) }}" alt="{{ $entry->title }}">

            <div>
                {{ $entry->body }}
            </div>
        </div>

    @endforeach


</body>
</html>
