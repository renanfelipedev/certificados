<div class="modal fade" id="importStudentModal" tabindex="-1" aria-labelledby="importStudentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Importar Participantes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('alunos.import', $team->id) }}" method="POST" id="import-student-form"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="" for="import-student">Selecione o arquivo</label>
                        <input type="file" name="file" class="form-control-file" id="import-student" required>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-success btn-icon-split m-1" form="import-student-form">
                    <span class="icon text-white-50">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Importar
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

@section('js')
    @if (count($errors) > 1)
        <script defer>
            document.addEventListener('DOMContentLoaded', () => {
                $('#importStudentModal').modal('show');
            });

        </script>
    @endif
@endsection
