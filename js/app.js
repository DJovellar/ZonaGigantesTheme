
// Estilo comentarios
const commentSubmit = document.getElementById('submit');
if (commentSubmit) {
    commentSubmit.className = 'btn color-giants text-white';
}

const commentTextArea = document.getElementById('comment');
if (commentTextArea) {
    commentTextArea.className = 'form-control';
}

const responseButton = document.querySelectorAll('.comment-reply-link');
if (responseButton) {
    responseButton.forEach(element => {
        element.className = 'btn btn-reply text-white'; 
    });
}
