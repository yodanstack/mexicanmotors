document.addEventListener('DOMContentLoaded', function () {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', './php/catalogo.php');
  xhr.onload = function () {
    if (xhr.status == 200) {
      var json = JSON.parse(xhr.responseText);
      var template = ``;
      json.map(function (data) {
        template += `
      <div class="row">
            <div class="card">
              <img class="mt-2" src="${data?.image_url}" class="card-img-top" >
              <div class="card-body">
                <h5 class="card-title">${data?.title}</h5>
                <p class="card-text">${data?.description}</p>
                <br>
                <strong></strong>
                <br>
                <a href="./producto_unico.html?id=" class="btn btn-primary">Comprar Ahora</a>
                <a href="./carrito.html"><i class="bi bi-cart"></i></a>
              </div>
            </div>
          </div>
      `;
      });
      document.getElementById('container_products').innerHTML = template;
    } else {
      console.log('error mierde:' + xhr.status);
    }
  };
  xhr.send();
});
