@if (Session::has('message'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 4000
        });

        Toast.fire({
            icon: "{{ Session::get('icon') }}",
            title: 'KEMENIK',
            text: "{{ Session::get('message') }}"
        });
    });
</script>
@endif