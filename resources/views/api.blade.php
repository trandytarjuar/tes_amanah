<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css" />
    <title>Document</title>
</head>

<body>
    <div class="table-responsive">
        <table class="table" id="api">
            <thead>
                <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">title</th>
                    <th scope="col">body</th>
                    <th scope="col">action</th>
                    <!-- <th scope="col">Handle</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($api as $row) : ?>
                    <tr>
                        <!-- <th></th> -->
                        <td><?= $row->title ?></td>
                        <td><?= $row->body ?></td>
                        <td>
                            <button type="button" class="btn-danger" onclick="delete_api('<?= $row->id ?>')">delete</button>
                            <button type="button" class="btn-primary" onclick="edit('<?= $row->id ?>')">edit</button>
                        </td>

                    </tr>

                <?php endforeach ?>

            </tbody>
        </table>
    </div>
    <div class="modal" id="editmodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Api</h5>
                    <button type="button" class="close" onclick="closeX()" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="editTitle">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closee()" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.js"></script>

    <script>
        $("#api").DataTable();

        function closeX() {
            $("#editmodal").hide()
            // alert("masuk")
        }

        function closee() {
            // alert("masulk")

            $("#editmodal").hide()
        }

        function delete_api(id) {
            // console.log(baseUrl)
            $.ajax({
                type: "GET",
                url: "{{url('api/delete')}}/" + id,
                cache: false,
                contentType: false,
                processData: false,
                data: false,
                success: function(response) {
                    Swal.fire({
                        title: "danger",
                        text: "User has been Deleted",
                        icon: "success",
                        confirmButtonColor: "#556ee6"
                    })

                    setTimeout(function() {
                        location.href = `{{url('api')}}`;
                    }, 2000);

                    // location.href = `${baseUrl}/cart`;
                }
            })
        }

        function edit(id) {
            
            $("#editmodal").show();
            let data = new FormData();
            var id_api = id
            // alert(id_api)

            data.append("id",id_api)

            $.ajax({
                type: "GET",
                url: "{{url('api/edit')}}" ,
                cache: false,
                contentType: false,
                processData: false,
                data: data,
                success: function(response){
                    let res = JSON.parse(response)
                    $("#editTitle").val(res.title)
                    console.log(JSON.parse(response))
                    // let res = JSON.parse(response)
                    // console.log(res)

                }

            })


            // let data 
        }
    </script>
</body>

</html>