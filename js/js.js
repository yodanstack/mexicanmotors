document.addEventListener("DOMContentLoaded", function(){
    var index = new XMLHttpRequest();
    index.open('GET','./php/productos.php');
    index.onload = function(){
        if(index.status == 200){
            var json = JSON.parse(index.responseText);
            let template = ``;

            json.map(function(data){
                template += `
                     <div class="col-12 col-md-12 col-lg-3">
             <div class="card bg-light shadow-sm border-0 px-2 py-3 mb-4">
                 <div class="text-center">
                     <img src="${data.image}" alt="">
                 </div>
                 <div class="card-body">
                     <h5 class="card-tittle">${data.title}</h5>
                     <p>
                     ${data.description}
                     </p>
                     <a href="./prductos_index" class="btn btn-primary">saber mas..</a>
                 </div>
             </div>
         </div>
                `;
            });
            document.getElementById('lista-productos').innerHTML=template;
        };
    };
    index.send();
});


// animacion de registro

