function errorSwal(string) {  
    Swal.fire({
        title: "Hata!",
        text: string,
        icon: "error"
    });
}

$('form[name="register_form"]').submit(function (event) { 
    event.preventDefault(); // Formun submit işlemini engelle
    
    var form = $('form[name="register_form"]');
    var formdata = form.serializeArray();
    var hasEmptyField = false;

    formdata.forEach(element => {
        if (element.value == "") {
            console.log(element.value);
            errorSwal("Tüm alanları doldurunuz.");
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
            if(response.register_success){
                Swal.fire({
                    title: "Başarılı!",
                    text: "Kayıt başarılı bir şekilde gerçekleşti.",
                    icon: "success"
                });
            }
        }
    });
});
