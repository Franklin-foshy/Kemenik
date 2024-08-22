// --------------------------- modal bienvenida -------------------------------
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modal');
    const cerrarModal = document.getElementById('close-modal');
    
    // Mostrar el modal al cargar la página
    
    // Cerrar el modal al hacer clic en el botón de cerrar
    cerrarModal.addEventListener('click', (e) => {
        e.preventDefault(); // Evitar el comportamiento por defecto del enlace
        modal.classList.add('modal-visible');
    });
});
// --------------------------- modal bienvenida -------------------------------
