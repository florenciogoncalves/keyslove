import Dropzone from 'dropzone'

const dropzoneArea = document.querySelectorAll("#photo1");

dropzoneArea.addEventListener("dragover", (e) => {
  e.preventDefault()
  e.target.classList.add('over')
});

dropzoneArea.addEventListener('dragleave', (e) => {
    e.target.classList.remove('over')
})

dropzoneArea.addEventListener('drop', (e) => {
    e.preventDefault()
    let file = e.dataTransfere.files[0]
    let efd
})