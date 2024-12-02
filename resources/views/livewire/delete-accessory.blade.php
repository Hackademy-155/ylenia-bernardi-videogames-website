<div>
    <div class="d-flex flex-column align-items-center">
        <p class="text-secondary">
            Vorresti eliminare questo articolo?
        </p>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Elimina Articolo
        </button>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminazione Articolo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sei sicuro di voler eliminare questo articolo?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button  wire:click="destroy" type="submit" class="btn btn-danger">Elimina Articolo</button>
                </div>
            </div>
        </div>
    </div>
</div>