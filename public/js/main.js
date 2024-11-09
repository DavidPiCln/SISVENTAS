(function($) {
    $(".toggle-password").click(function() {
        // Alterna las clases del icono para cambiar entre "ver" y "ocultar"
        $(this).toggleClass("zmdi-eye zmdi-eye-off");
        
        // Selecciona el campo de entrada usando el valor del atributo "toggle"
        var input = $($(this).attr("toggle"));
        
        // Cambia el tipo de entrada entre "password" y "text"
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
})(jQuery);

document.getElementById("form-login").addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault(); // Previene el comportamiento predeterminado
    this.submit(); // Envía el formulario
  }
});


document.getElementById('miFormulario').addEventListener('submit', async function (event) {
  event.preventDefault(); // Evita la recarga de la página

  const formData = new FormData(this);
  const url = this.action;
  const maxRetries = 5;
  let attempts = 0;

  while (attempts < maxRetries) {
      try {
          const response = await fetch(url, {
              method: 'POST',
              body: formData,
              headers: {
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
              }
          });

          if (response.status === 429) {
              const retryAfter = response.headers.get('Retry-After');
              const waitTime = retryAfter ? parseInt(retryAfter) * 1000 : 1000;
              console.log(`Demasiadas solicitudes. Esperando ${waitTime / 1000} segundos...`);
              await new Promise(resolve => setTimeout(resolve, waitTime));
              attempts++;
              continue;
          }

          if (response.ok) {
              console.log('Formulario enviado exitosamente');
              break;
          }

          throw new Error(`Error: ${response.status}`);
      } catch (error) {
          console.error(error);
          attempts++;
          if (attempts === maxRetries) {
              alert('Se alcanzó el número máximo de intentos');
          }
      }
  }
});