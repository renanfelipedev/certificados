<div class="modal fade" id="changeCertificateModal" tabindex="-1" aria-labelledby="changeCertificateModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alterar modelo de certificado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alterar.certificado', $team->id) }}" method="POST" id="change-certificate-form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="" for="change-certificate">Selecione o arquivo</label>
                        <input type="file" name="file" class="form-control-file" id="change-certificate" required>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-success btn-icon-split m-1" form="change-certificate-form">
                    <span class="icon text-white-50">
                        <i class="fa fa-edit"></i>
                    </span>
                    <span class="text">
                        Alterar
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
