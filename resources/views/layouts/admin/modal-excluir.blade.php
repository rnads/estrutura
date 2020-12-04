<div class="modal fade" id="modal-excluir" tabindex="-1" role="dialog"
     aria-labelledby="modal-excluir-label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-excluir-label">Confirmação de exclusão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-left">
        <form id="modal-excluir-form" action="" method="post">
          @csrf @method('DELETE')
          <div id="modal-excluir-description"></div>
          <div class="text-right">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-outline-danger">Excluir</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


