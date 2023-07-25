const handleDelete = (id, action) => {

    Swal.fire({
        title: '¿Seguro de eliminar?',
        text: "¡Esta acción no se podrá cambiar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('handleDelete', id, action)
        }
    })
}

const deleteComment = (id, post, action, method) => {
    $('#response-comment').modal('hide');
    Swal.fire({
        title: '¿Seguro de eliminar?',
        text: "¡Esta acción no se podrá cambiar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit(method, id, post, action)
        }
    })
}


const handlerStatusComment = (id, post, action, status) => {
    Swal.fire({
        title: status === 'ACTIVO' ? '¿Seguro de Deshabilitar?':'¿Seguro de Habilitar?',
        text: "¡Se reflejará el comentario en la publiación. Esta acción se puede cambiar cuantas veces quieras!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: status === 'ACTIVO' ? 'Sí, deshabilitar':'Sí, habilitar',
        }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit('handlerStatusComment', id, post, action)
        }
    })
}

const handlePassword = (id, action) => {
    $('#usuario-component').modal('hide');
    Swal.fire({
        title: 'Cambiar contraseña',
        input: 'password',
        inputPlaceholder: 'Ingrese tu contraseña',
        inputAttributes: {
            maxlength: 15,
            autocapitalize: 'off',
            autocorrect: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Cambiar',
        showLoaderOnConfirm: true,
        preConfirm: (password) => {
            if (password.length > 3){
                window.livewire.emit('handlePassword', id, action, password)
            }else{
                Swal.showValidationMessage('La contraseña debe tener 4 carcteres o más')
            }
        },
    })
}

const addCommentResponse = (comment_id, post_id, action) => {
    $('#response-comment').modal('hide');
    Swal.fire({
        title: 'Agregar respuesa',
        input: 'text',
        inputPlaceholder: 'Ingrese su respuesta',
        inputAttributes: {
            maxlength: 255,
            autocapitalize: 'off',
            autocorrect: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        showLoaderOnConfirm: true,
        preConfirm: (response) => {
            if (response.length > 3){
                window.livewire.emit('addCommentResponse', comment_id, response, post_id, action)
            }else{
                Swal.showValidationMessage('La respuesta debe tener 4 carcteres o más')
            }
        },
    })
}



