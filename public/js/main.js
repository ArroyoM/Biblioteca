function eliminarUsuario(event, obj){

    event.preventDefault();

    if(confirm("Esta seguro que deseas eliminarlo?")){
        
        fetch(obj.getAttribute('href'))
        .then(function(response) {
            return response.text();
        })
        .then(function(data) {
            if(data == 1){
                location.reload();
            }else{
                alert('no se a podido eliminar');
            }
            console.log('data = ', data);
        })
        .catch(function(err) {
            console.error(err);
        });
    }


}