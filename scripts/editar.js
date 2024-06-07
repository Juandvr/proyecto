document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("modal");
    var span = document.getElementsByClassName("cerrar")[0];

    document.querySelectorAll('.editar').forEach(function(button) {
        button.onclick = function(event) {
            event.preventDefault();
            var id = this.getAttribute('data-id');
            loadModalContent(id);
            modal.style.display = "block";
        };
    });

    span.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };

    function loadModalContent(id) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'PHP/editar.php?id=' + id, true);
        xhr.onload = function() {
            if (this.status == 200) {
                document.getElementById('modalBody').innerHTML = this.responseText;
            } else {
                document.getElementById('modalBody').innerHTML = 'Error al cargar el contenido';
            }
        };
        xhr.send();
    }
});
