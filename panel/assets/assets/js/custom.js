$(document).ready(function () {


    $(".remove-btn").click(function () {

        $data_url = $(this).data("url");
        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, Sil',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.value) {
               window.location.href = $data_url;
            }
        });
    })



});