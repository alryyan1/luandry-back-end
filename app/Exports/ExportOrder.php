<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;



class ExportOrder implements FromCollection,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::select('orders.order_number','orders.created_at',
        'customers.name as customer_name',
        'payment_type','amount_paid','status','payment_status','users.username')
        ->leftjoin('customers','customers.id','orders.customer_id')
        ->join('users','users.id','orders.user_id')
        ->get();
        return $orders;
    }

    public function headings(): array
    {
        return [
            'رقم الطلب',
            'تاريخ الطلب',
            'الزبون',
            'نوع السداد',
            'المبلغ',
            'حالة الطلب',
            'حالة السداد',
            ' اسم المستخدم',
        ];
    }
}
