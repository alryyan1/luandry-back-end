<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=11" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <style>
            @import url('http://fonts.googleapis.com/earlyaccess/droidarabickufi.css');
            * {
                font-family: 'Droid Arabic Kufi', serif;
              }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css" integrity="sha512-/k658G6UsCvbkGRB3vPXpsPHgWeduJwiWGPCGS14IQw3xpr63AEMdA8nMYG2gmYkXitQxDTn6iiK/2fD4T87qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <br><br>
    <body class="container" dir="rtl">
        <div class="card">
            <div class="card-header text-right arabic bg-secondary">
                <label>تقرير الأصناف</label>
            </div><br>

            <div class="card-body">
                <div align="right">
                    <form method="GET" action="itemReport">
                        <div class="row" style="direction:ltr;">
                            <div class="form-group col-lg-1">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                            </div>
                            <div class="form-group col-lg-6">
                                <select name='item_id' class="form-control" dir='rtl' required>
                                    <option value="">الصنف</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->ar_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                @if(isset($costs))
                <div class="center">
                    <table class="table text-center" dir="rtl" align="center">
                        <thead>

                            @if(isset($item_info))
                            <tr class="arabic" class="bg-info">
                                <th colspan="2" class="text-center">الصنف</th>
                                <th class="text-center">{{ $item_info->ar_name }}</th>
                            </tr>
                            @endif
                            <tr class="arabic" class="text-right">
                                <th class="text-center">#</th>
                                <th class="text-center">المورد</th>
                                <th class="text-center">سعر الوحدة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($costs))
                                @foreach ($costs as $cost)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> @if(!is_null($cost['cost']['supplier'])) {{ $cost['cost']['supplier']->name }} @endif</td>
                                    <td>{{ $cost->price }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </body>
</html>
