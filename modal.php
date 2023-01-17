<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Создание группы</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="idPlay">hhh</p>

            </div>
        </div>
    </div>
</div>

<script>
    function getIdModal(id) {
        console.log(id);
        el = document.getElementById('idPlay');
        el.innetHTML = id;
    }
</script>