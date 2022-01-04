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
        <a href="/entry"><button>New entry</button></a>
    </div>
    <div>
        <h3>{{ $user->name }}'s Journal</h3>
    </div>
    @foreach ($entries as $i)
        <div>
            <div>
                <b>Date:</b> {{ $i->created_at }}
            </div>
            <div>
                <b>TItle:</b> {{ $i->title }}
            </div>
            <div>
                {{ $i->img }}
            </div>
            <div>
                {{ $i->body }}
            </div>
        </div>

    @endforeach


</body>
</html>
