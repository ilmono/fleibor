$(function () {
    $(document).ready(function(){
        initModals();
    });


    function initModals() {


        $('.borrar-usuario').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#username',
            modal: true
        });
    }
    $(document).on('click', '.borrar-usuario', function () {
        var id = $(this).attr('id');
        var text = "'" + $('#nombre-'+id).html() + "'";
        $('#modal-text').html(text);
        $('#usr-id-del').val(id);
    });
    $(document).on('click', '.popup-modal-dismiss', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
    });
});