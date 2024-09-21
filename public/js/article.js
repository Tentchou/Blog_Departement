document.getElementById('thesisForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Collecting form data
    const title = document.getElementById('title').value;
    const description = document.getElementById('description').value;
    const content = document.getElementById('content').value;
    const file = document.getElementById('file').files[0];
    const publicationDate = document.getElementById('publicationDate').value;

    // You would handle saving this data to the database here
    // For example, using an AJAX request to send the data to the server

    alert('Article saved successfully!');

    // Reset the form after submission
    document.getElementById('thesisForm').reset();
});
