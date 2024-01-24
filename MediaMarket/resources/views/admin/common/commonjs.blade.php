<script>
    $(".action_delete").on('click', function(e){
        e.preventDefault();
        let urlRequest = $(this).data('url');
        let element = $(this);
        swal({
            title: "Bạn có thực sự muốn xóa?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: "GET",
                    url: urlRequest,
                    success: function(data){
                        if (data.code == 200){
                            element.parent().parent().remove();
                            swal("Xóa thành công!", {
                                icon: "success",
                                button: false,
                                timer: 1000,
                            });
                            location.reload();
                        }
                    }
                })
            }
        });
    })
</script>
