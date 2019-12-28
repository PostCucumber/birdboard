<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Create a Project</h1>
        <form method="POST" action="/projects">
            @csrf
            <div>
                <label for="title">Title</label>
            </div>
            <div>
                <input type="text" name="title" placeholder="title">
            </div>
            <div>
                <div>
                    <label for="description">Description</label>
                </div>
                <div>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div>
                <div>
                    <button type="submit">Create</button>
                </div>
            </div>
        </form>
    </body>
</html>