<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=11" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <style>
            @import url('http://fonts.googleapis.com/earlyaccess/droidarabickufi.css');
            .arabic {
                font-family: 'Droid Arabic Kufi', serif;
              }
            .english {
                font-family: 'Poppins', serif;
              }
        </style>
        <script>
            function editItem(id)
            {
                var ar_name = "ar_name"+id;
                var en_name = "en_name"+id;


                document.getElementById("item_id").value = id;
                document.getElementById("ar_name").value = document.getElementById(ar_name).innerHTML;
                document.getElementById("en_name").value = document.getElementById(en_name).innerHTML;

                $("#edit").modal('show');
            }

            function destroy(id)
            {
                Swal.fire({
                    title: "تحذير",
                    text:  "هل أنت متأكد من الحذف؟",
                    icon: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    customClass: "arabic",
                }).then((result) => {
                    if (result.value)
                    {
                        window.location = "items/"+id;
                    }
                });
            }
        </script>

        <link rel="stylesheet" href="/kitchen-laravel/public/js/sweetalert2/sweetalert2.min.css">



    </head>

    <br><br>
    <body class="container" dir="rtl">

        @if (Session::has('message'))
            <script src="/kitchen-laravel/public/js/sweetalert2/sweetalert2.min.js"></script>
            <script>
                Swal.fire({
                    title: 'نجاح',
                    html: "{!! Session::get('message') !!}",
                    icon: "success",
                    customClass: "arabic",
                    timer: 3000,
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            </script>
        @endif

        <div class="modal fade" id="edit"  tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered arabic" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center font-weight-bold">
                            تعديل الصنف
                        </h3>
                    </div>

                    <form method="POST" action="updateItem">
                        @csrf
                        <input type="hidden" id="item_id" name="item_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class='text-danger'>*</i> الصنف بالعربية
                                 </label>
                                <input type="text" class="form-control" name="ar_name" id='ar_name' required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">الصنف بالإنجليزية </label>
                                <input type="text" class="form-control" name="en_name" id='en_name'>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between" style="display: flex; justify-content:space-between;">
                            <button type="button" class="btn btn-primary float-start" data-bs-dismiss="modal">إلغاء</button>
                            <input type="submit" value="تعديل" class="btn btn-warning float-end">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-right arabic bg-secondary">
                الأصناف
            </div>

            <div class="card-body row">
                <div class="col-lg-8">
                    <table class="table text-center" dir="rtl" align="center">
                        <thead>
                            <tr class="arabic">
                                <th>#</th>
                                <th>الصنف بالعربية </th>
                                <th>الصنف بالإنجليزية</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr class="english">
                                <td>{{ $loop->iteration }}</td>
                                <td id="ar_name{{ $item->id }}" class="arabic">{{ $item->ar_name }}</td>
                                <td id="en_name{{ $item->id }}">{{ $item->en_name }}</td>
                                <td class="arabic">
                                    <button type="button" class="btn btn-warning text-white" onclick="editItem({{ $item->id }})">تعديل</button>
                                    <button type="button" class="btn btn-danger text-white"  onclick="destroy({{ $item->id }})">حذف</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-4 arabic">
                    <form method="post" action="createItem">
                        @csrf
                        <div class="form-group">
                            <label class="form-label"><i class='text-danger'>*</i> الصنف بالعربية </label>
                            <input type="text" class="form-control" name="ar_name" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">  الصنف بالإنجليزية </label>
                            <input type="text" class="form-control" name="en_name">
                        </div>
                        <div class="form-group" align="center">
                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="حفظ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    <script src="/kitchen-laravel/public/js/sweetalert2/sweetalert2.min.js"></script>
    <script src="/kitchen-laravel/public/js/sweetalert2/sweet-alerts.js"></script>

</html>
