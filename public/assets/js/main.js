function toggle(key) {
  var all = document.getElementsByName("" + key + "");
  var checkboxes = document.querySelectorAll("[id=" + key + "]");
  if (all[0].checked == true) {
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = true;
    }
  } else {
    for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = false;
    }
  }
}

function confirmDelete(id, status, module) {
  var action = (status === 0) ? 'habilitar' : 'inhabilitar';
  Swal.fire({
    text: '¿Está seguro que desea ' + action + ' ' + module + '?',
    icon: 'question',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonColor: '#696cff',
    cancelButtonText: 'No',
    confirmButtonText: 'Si',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("delete_form_" + id).submit();
    }
  })
}

function confirmRecover(id) {
  Swal.fire({
    text: '¿Está seguro que desea reestablecer la contraseña del usuario?, esto le enviara un correo electrónico con una nueva contraseña.',
    icon: 'question',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonColor: '#696cff',
    cancelButtonText: 'No',
    confirmButtonText: 'Si',
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById("recover_form_" + id).submit();
    }
  })
}

$('.data-table').DataTable({
  pageLength: 10,
  language: {
    "processing": "Cargando información...",
    "lengthMenu": "Mostrar _MENU_",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Sin registros...",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(Datos filtrados de un total de _MAX_ registros)",
    "search": "Buscar: ",
    "infoThousands": ",",
    "loadingRecords": "Cargando información...",
    "paginate": {
      "first": "Primero",
      "last": "Último",
      "next": "Siguiente",
      "previous": "Anterior"
    },
    "aria": {
      "sortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  },
  "aaSorting": [],
});