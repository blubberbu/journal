<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Entry</title>
</head>
<body>
    <h2>New Entry</h2>

    <form action="/new-entry" enctype="multipart/form-data" method="POST" id="add-entry-form" class="form">
        @csrf

        <div>
            <label for="entry-title">Title</label>
            <input type="text" name="title" id="entry-name">
        </div>

        <div>
            <label for="entry-image">Entry Image</label>
            <input type="file" name="image" id="entry-image">
        </div>

        <div>
            <label for="entry-body">Body</label>
            <textarea name="body" id="entry-body"></textarea>
        </div>

        <button type="submit">Save Entry</button>
    </form>

    @if ($errors->hasBag('insert'))
        <div class="error-container">
            <label for="error" class="error-label">
                <span class="material-icons-round">
                    warning
                </span>
                {{ $errors->insert->first() }}
            </label>
        </div>
    @endif
</body>
</html>
