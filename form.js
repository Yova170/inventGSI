<script>
    document.addEventListener('DOMContentLoaded', function() {
    const formElements = document.querySelectorAll('form input, form select');
    
    // Restaurar valores
    formElements.forEach(element => {
        const savedValue = localStorage.getItem(element.name);
        if (savedValue) {
            element.value = savedValue;
        }
    });
    
    // Guardar valores al cambiar
    formElements.forEach(element => {
        element.addEventListener('change', function() {
            localStorage.setItem(element.name, element.value);
        });
    });

    // Limpiar almacenamiento local cuando se envíe el formulario
    document.querySelector('form').addEventListener('submit', function() {
        formElements.forEach(element => {
            localStorage.removeItem(element.name);
        });
    });
});
</script>
