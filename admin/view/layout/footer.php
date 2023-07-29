</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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