@if (Session::has('message'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            position: 'center',
            icon: "{{ Session::get('icon') }}",
            title: 'KEMENIK',
            text: "{{ Session::get('message') }}",
            showConfirmButton: false,
            timer: 2000
        });
    });
</script>
@endif