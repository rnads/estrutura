
        $('.modal-excluir').click(function (event) {
          var btnExcluir = $(this);

          $('#modal-excluir-form').attr('action', btnExcluir.data('action'));
          $('#modal-excluir-description').html(btnExcluir.data('description'));
        })
