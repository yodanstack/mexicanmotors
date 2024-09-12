// // const block = document.querySelector('#container .col-lg-3');

// // for (let i = 0; 0 <= 9; i++){
// //     const clone = block.cloneNode(true);
// //     document.getElementById('container').appendChild(clone);
// // }

// $(document).ready(function () {
//   console.log('Hola');
// });

// var llamar = function () {
//   $.get('../json/productos.json', (data, status) => {
//     const filtrado = data.products.filter((product) => product.id === 3)[0];
//     console.log(filtrado);
//     for (let i = 0; i < data.products.length; i++) {
//       const product = data.products[i];

//       $('.lista-productos').append(`
//         <div class="col-12 col-md-12 col-lg-3">
//             <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
//                 <div class="text-center">
//                     <img src="${product.image}" alt="">
//                 </div>
//                 <div class="card-body">
//                     <h5 class="card-tittle">${product.title}</h5>
//                     <p>
//                     ${product.description}
//                     </p>
//                     <a href="#" class="btn btn-primary">saber mas..</a>
//                 </div>
//             </div>
//         </div>
//     `);
//     }

//     console.log(data);
//   });
// };

// $(document).ready(function () {
//   console.log('Hola');
//   producto();
// });




//para llamar el archivo Json
// var producto = function () {
//   $.get('../json/catalogo.json', (data, status) => {
//     var id = $.urlParam('id');
//     console.log(id);
//     const product = data.catalogo.filter((element) => element.id == id)[0];
//     console.log(product);

//     $('.pro_unico').append(`
//         <div class="tittle">
//         <h3>${product.title}</h3>
//         </div>
//         <div class="imagen">
//             <img src="${product.image_url}">
//         </div>

//         <div class="descripcion_produc">
//             <h4>${product.description}</h4>
//             <p></p>
//         </div>

//         <div class="btn">
//             <button>Agregar Carrito</button>
//             <button>Comprar</button>
//         </div>
//     `);

//     console.log(data);
//   });
// };

// $.urlParam = function (name) {
//   var results = new RegExp('[?&]' + name + '=([^&#]*)').exec(
//     window.location.href,
//   );
//   return results ? decodeURIComponent(results[1].replace(/\+/g, ' ')) : null;
// };

function obtenerParametroURL(nombre) {
  const urlParams = new URLSearchParams(window.location.search);
  return urlParams.get(nombre);
};

const productid = obtenerParametroURL('id');

  fetch('./php/productos.php')
    .then(Response => response.json())
    .then(data => {
        const producto = data.find(p => p.id == productid);

        mostrarproducto(producto);
    });

    function mostrarproducto(producto){
        const info = document.getElementById('container_product_index');

          if(producto) {
            info.innerHTML =  `
            <div class="tittle">
            <h3>${producto.title}</h3>
        </div>
        <div class="image_product">
            <img src="${producto.image_url}">
        </div>
        <div class="descr_container">
              <div class="price"> 
              <strong>${producto.price}</storng>
              </div>
            <div class="btn_product">
                <button>Agregar Carrito</button>
                <button>Comprar</button>
            </div>
            <div class="description_product">
                <div class="descrip_tittle">
                    <h4>Descripcion del producto</h4>
                </div>
                <p>
                    ${producto.description}
                </p>
            </div>
        </div>
    </div>
            `;
          } else {
            alert('No se encuentra el producto en stock')
          }
    }