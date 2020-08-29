<!-- Modal -->
<div class="modal fade" id="activitiesShowModal-{{ $activity->id }}" tabindex="-1"
    aria-labelledby="activitiesShowModal-{{ $activity->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activitiesShowModal-{{ $activity->id }}">
                    <strong>Dados da Atividade</strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label class="col-form-label">Tipo de Atividade</label>
                            <input type="text" class="form-control" readonly value="{{ $activity->type->title }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="col-form-label">Título</label>
                            <input type="text" class="form-control" readonly value="{{ $activity->title }}">
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="col-form-label">Carga Horária</label>
                            <input type="text" class="form-control" readonly value="{{ $activity->workload }} Horas">
                        </div>

                        <div class="form-group col-sm-12">
                            <label for="message-text" class="col-form-label">Conteúdo Programático</label>
                            <p>
                                {!! $activity->content !!}
                            </p>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
