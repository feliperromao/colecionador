const addNotify = function (typeMessage, message = '') {
    let colorAlert = '';

    switch (typeMessage){
        case 'danger':
            colorAlert = 'alert-danger'; break;
        case 'warning':
            colorAlert = 'alert-warning'; break;
        case 'success':
            colorAlert = 'alert-success'; break;
        case 'primary':
            colorAlert = 'alert-primary'; break;
        case 'secondary':
            colorAlert = 'alert-secondary'; break;
        case 'info':
            colorAlert = 'alert-info'; break;
        case 'light':
            colorAlert = 'alert-light'; break;
        case 'dark':
            colorAlert = 'alert-dark'; break;
        default: colorAlert = '';
    }

    const alert =
        `<div class='alert ${colorAlert} alert-dismissible fade show' role='alert'>${message}<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>`
    return alert
}