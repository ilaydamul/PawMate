document.getElementById("year").textContent = new Date().getFullYear();





$("#advert").click(function () {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: "Başvuru Yap",
        text: "İlana başvuru yapmak istediğinize emin misiniz?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Evet",
        cancelButtonText: "Hayır",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire({
                title: "Başarılı",
                text: "İlan başvurunuz başarıyla yapıldı.",
                icon: "success",
                confirmButtonText: "Kapat",
            });
        }
    });
})

$("#update").click(function () {
    Swal.fire({
        icon: "success",
        title: "Başarılı!",
        showConfirmButton: false,
        timer: 1500
    });
})

$("#add-ad").click(function () {
    Swal.fire({
        icon: "success",
        title: "Başarılı!",
        text: "İlan başarılı bir şekilde eklendi.",
        showConfirmButton: false,
        timer: 1500
    });
})