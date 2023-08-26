</div>
</div>



<script>
    // hộp thoại confrim khi xóa
    function confirmDelete(link) {

        swal({
                title: "Bạn có chắc là muốn xóa không?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Xóa thành công!", {
                        icon: "success",
                    });
                    swal("Xóa thành công!!");
                    window.location.href = "index.php?url=" + link
                } else {

                }
            });
    }
</script>
</body>



</html>