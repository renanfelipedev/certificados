<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">

    <form action="{{ $formAction }}" method="POST" id="{{ $formName }}">
        @csrf
        @method('DELETE')
    </form>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $message }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger" form="{{ $formName }}">{{ $btnText }}</button>
            </div>
        </div>
    </div>
</div>
