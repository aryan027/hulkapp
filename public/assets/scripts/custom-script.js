function showNotification(message, title, type){
    switch (type){
        case 'Info':
            toastr.info(message, title);
            break;
        case 'Success':
            toastr.success(message, title);
            break;
        case 'Warning':
            toastr.warning(message, title);
            break;
        case 'Error':
            toastr.error(message, title);
            break;
    }
}

function restrictAlphabets(e) {
    var x = e.which || e.keycode;
    if ((x >= 48 && x <= 57 ))
        return true;
    else
        return false;
}

function preview_image(event)
{
    const file = this.files[0];
    console.log(file);
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
}

function process() {
    const file = document.querySelector("#profile_photo").files[0];

    if (!file) return;

    const reader = new FileReader();

    reader.readAsDataURL(file);

    reader.onload = function (event) {
        const imgElement = document.createElement("img");
        imgElement.src = event.target.result;
        document.querySelector("#input").src = event.target.result;

        imgElement.onload = function (e) {
            const canvas = document.createElement("canvas");
            const MAX_WIDTH = 100;

            const scaleSize = MAX_WIDTH / e.target.width;
            canvas.width = MAX_WIDTH;
            canvas.height = e.target.height * scaleSize;

            const ctx = canvas.getContext("2d");

            ctx.drawImage(e.target, 0, 0, canvas.width, canvas.height);

            const srcEncoded = ctx.canvas.toDataURL(e.target, "image/jpeg");

            // you can send srcEncoded to the server
            document.querySelector("#output").value = srcEncoded;
        };
    };
}
