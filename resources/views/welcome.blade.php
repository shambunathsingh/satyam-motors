<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
</head>

<body>
    <h1>Classic editor</h1>
    <form id="editorForm"> <!-- Added an ID to the form -->
        <textarea name="" id="editor" cols="10"></textarea>
        <button type="submit" id="submitButton">Submit</button>
    </form>
    <br>
    <br>
    <br>
    <div id="para"></div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        document.getElementById('editorForm').addEventListener('submit', function(event) { // Changed to submit event
            event.preventDefault(); // Prevents the default form submission behavior
            var editorData = document.querySelector('#editor').value;
            document.getElementById('para').textContent = editorData;
        });
    </script>
</body>

</html>
