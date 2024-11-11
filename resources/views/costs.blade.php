<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=11" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
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
            .custom-popover {
                --bs-popover-max-width: 200px;
                --bs-popover-border-color: var(--bs-primary);
                --bs-popover-header-bg: var(--bs-primary);
                --bs-popover-header-color: var(--bs-white);
                --bs-popover-body-padding-x: 1rem;
                --bs-popover-body-padding-y: .5rem;
                font-family: 'Droid Arabic Kufi', serif;
              }
        </style>
        <script>
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover({
                    customClass: 'arabic'});
              });

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
                        window.location = "destroyCost/"+id;
                    }
                });
            }

            function showDetails()
            {
                $('#toaster').show();
            }
        </script>

        <link rel="stylesheet" href="/kitchen-laravel/public/js/sweetalert2/sweetalert2.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css" integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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

        <div class="card">
            <div class="card-header text-right arabic bg-secondary justify-content-between d-flex" style="display: flex; justify-content:space-between;">
                <div class="float-start">
                    <a class='btn btn-success' href="costs/create"><i class='mdi mdi-plus'></i></a>
                    <label>المصروفات</label>
                </div>

                <div class="float-end">
                    <a class='btn btn-primary text-white btn-md' href="itemReport">تقرير الأصناف</a>
                </div>

            </div>

            <div class="card-body row">
                <div class="col-lg-12">
                    <table class="table text-center" dir="rtl" align="center">
                        <thead>
                            <tr class="arabic">
                                <th>#</th>
                                <th>المورد</th>
                                <th>وصف المصروف</th>
                                <th>قسم المصروف</th>
                                <th>المبلغ</th>
                                <th>العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($costs as $cost)

                            <tr class="english">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cost->supplier_name }}</td>
                                <td>{{ $cost->description }}</td>
                                <td>{{ $cost->category }}</td>
                                <td>{{ $cost->amount }}</td>
                                <td class="arabic">

                                    <button  type="button" class="btn btn-info text-white arabic" data-toggle="popover" title="التفاصيل" data-html="true" data-content="<ul class='list-group' dir='rtl'>
                                            @foreach ($cost['costItem'] as $item)
                                                <li class='list-group-item'><span class='badge'>{{ $item->quantity }}</span>&nbsp;&nbsp;&nbsp;{{ $item['item']->ar_name }}</li>
                                            @endforeach
                                            </ul>" data-custom-class="custom-popover">
                                        <i class="mdi mdi-information text-white"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger text-white"  onclick="destroy({{ $cost->id }})">
                                        <i class="mdi mdi-delete text-white"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    <script src="/kitchen-laravel/public/js/sweetalert2/sweetalert2.min.js"></script>
    <script src="/kitchen-laravel/public/js/sweetalert2/sweet-alerts.js"></script>

</html>
