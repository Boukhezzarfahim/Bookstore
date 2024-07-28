<div>
    @if ($currentPage == PAGEDETAILS)
        @include('livewire.admin.contacts.details')
    @endif
    @if ($currentPage == PAGELIST)
        @include('livewire.admin.contacts.liste')
    @endif

    <script>
        window.addEventListener("showSuccessMessage", event => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast: true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
            });
        });

        window.addEventListener("showConfirmMessage", event => {
            Swal.fire({
                title: event.detail.message.title,
                text: event.detail.message.text,
                icon: event.detail.message.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Continuer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    const contact_id = event.detail.message.data.contact_id;
                    if (contact_id) {
                        @this.deleteContact(contact_id);
                    }
                }
            });
        });
    </script>
</div>
