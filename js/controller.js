function errorSwal(string) {  
    Swal.fire({
        title: "Hata!",
        text: string,
        icon: "error"
    });
}
function successSwal(string){
    Swal.fire({
        title: "Başarılı!",
        text: string,
        icon: "success"
    });

}

$('form[name="register_form"]').submit(function (event) { 
    event.preventDefault();
    
    var form = $('form[name="register_form"]');
    var formdata = form.serializeArray();
    var FormContinue = false;

    formdata.forEach(element => {
        if (element.value == "") {
            errorSwal("Tüm alanları doldurunuz.");
            FormContinue = true;
            return false; 
        }
        if(element.name == "register_password" && element.value.length < 8){
            errorSwal("Şifre en az 8 karakter olmalıdır.");
            FormContinue = true;
            return false;
        }
        if(element.name == "register_age" && element.value < 0){
            errorSwal("Yaş değeri negatif olamaz.");
            FormContinue = true;
            return false;
        }
        element.value = element.value.trim();
    });
    if (FormContinue) return false;
    $.ajax({
        type: "POST",
        url: "src/controller.php",
        data: formdata,
        dataType: "JSON",
        success: function (response) {
            if(response.status == "success"){
                successSwal(response.message);
                setTimeout(() => {
                    window.location.href = "login.php";
                }, 1500);
            }
            else if (response.status == "error") {
                errorSwal(response.message);
            }
        }
    });
});
$('form[name="login_form"]').submit(function () { 
    var form = $('form[name="login_form"]');
    var formdata = form.serializeArray();
    var hasEmptyField = false;
    formdata.forEach(element => {
        if (element.value == "") {
            errorSwal("Tüm alanları doldurunuz.");
            hasEmptyField = true;
            return false; 
        }
        element.value = element.value.trim();
    });
    if (hasEmptyField) return false;
    $.ajax({
        type: "POST",
        url: "src/controller.php",
        data: formdata,
        dataType: "JSON",
        success: function (response) {
            if(response.status == "success"){
                successSwal(response.message);
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1500);
            }
            else if (response.status == "error") {
                errorSwal(response.message);
            }
        }
    });
});
$('form[name="profile_update_form"]').submit(function (event) {
    event.preventDefault();
    var form = $('form[name="profile_update_form"]');
    var formdata = form.serializeArray();
    var hasEmptyField = false;
    formdata.forEach(element => {
        if (element.value == "") {
            errorSwal("Tüm alanları doldurunuz.");
            hasEmptyField = true;
            return false; 
        }
        element.value = element.value.trim();
        if(element.name == "profile_password" && element.value.length < 8){
            errorSwal("Şifre en az 8 karakter olmalıdır.");
            hasEmptyField = true;
            return false;
        }
    });
    if (hasEmptyField) return false;
    $.ajax({
        type: "POST",
        url: "src/controller.php",
        data: formdata,
        dataType: "JSON",
        success: function (response) {
            if(response.status == "success"){
                successSwal(response.message);
            }
            else if (response.status == "error") {
                errorSwal(response.message);
            }
        }
    });
});
$('form[name="create_advert"]').submit(function() {
    var form = $('form[name="create_advert"]');
    var formdata = form.serializeArray();
    var hasEmptyField = false;
    formdata.forEach(element => {
        if (element.value == "") {
            errorSwal("Tüm alanları doldurunuz.");
            hasEmptyField = true;
            return false; 
        }
        if(element.name == "age" && element.value < 0){
            errorSwal("Yaş değeri negatif olamaz.");
            hasEmptyField = true;
            return false;
        }
        element.value = element.value.trim();
    });
    if (hasEmptyField) return false;
    $.ajax({
        type: "POST",
        url: "src/controller.php",
        data: formdata,
        dataType: "JSON",
        success: function (response) {
            if(response.status == "success"){
                successSwal(response.message);
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1500);
            }
            else if (response.status == "error") {
                errorSwal(response.message);
            }
        }
    });
});
$('form[name="advert_basvuru"]').submit(() => {
    var form = $('form[name="advert_basvuru"]');
    var formdata = form.serializeArray();
    var hasEmptyField = false;
    formdata.forEach(element => {
        if (element.value == "") {
            errorSwal("İlana başvuru yapılırken bir hata oluştu! Lütfen yöneticiyle iletişime geçin!");
            hasEmptyField = true;
            return false; 
        }
        element.value = element.value.trim();
    });
    if (hasEmptyField) return false;
    $.ajax({
        type: "POST",
        url: "src/controller.php",
        data: formdata,
        dataType: "JSON",
        success: function (response) {
            if(response.status == "success"){
                successSwal(response.message);
                setTimeout(() => {
                    location.reload();
                }, 1500);
            }
            else if (response.status == "error") {
                errorSwal(response.message);
            }
        }
    });
});
$("button[name='delete_button']").click(function () {
    var delete_button_id = $(this).data("id");
    var delete_status = true;
    if(delete_button_id == "" || delete_button_id == null || delete_button_id == undefined || isNaN(delete_button_id) || !parseInt(delete_button_id)){
        errorSwal("İlan silinirken bir hata oluştu! Lütfen yöneticiyle iletişime geçin!");
        delete_status = false;
    }
    if(delete_status){
        $.ajax({
            type: "POST",
            url: "src/controller.php",
            data: {delete_button_id},
            dataType: "JSON",
            success: function (response) {
                if(response.status == "success"){
                    successSwal(response.message);
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                }
                else if (response.status == "error") {
                    errorSwal(response.message);
                }
            }
        });
    }
});
$("input[name='profile_phone-no']").keydown((event) => {
    var currentlength = $(event.target).val().length;

    if(currentlength >= 10 && event.key !== "Backspace" && event.key !== "Delete"){
        event.preventDefault();
    }
});
$("input[name='register_phone-no']").keydown((event) => {
    var currentlength = $(event.target).val().length;

    if(currentlength >= 10 && event.key !== "Backspace" && event.key !== "Delete"){
        event.preventDefault();
    }
});