<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Cost;
use App\Models\Deduct;
use App\Models\DeductedItem;
use App\Models\Deposit;
use App\Models\DoctorShift;
use App\Models\Doctorvisit;
use App\Models\Item;
use App\Models\LabRequest;
use App\Models\MainTest;
use App\Models\Order;
use App\Models\OrderMeal;
use App\Models\Package;
use App\Models\Patient;
use App\Models\PrescribedDrug;
use App\Models\RequestedChildMeal;
use App\Models\RequestedResult;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Settings;
use App\Models\Shift;
use App\Models\Shipping;
use App\Models\Specialist;
use App\Models\User;
use App\Models\Whatsapp;
use Carbon\Carbon;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Mypdf\Pdf;
use Illuminate\Support\Facades\DB;
use NumberToWords\NumberToWords;
use PhpOffice\PhpSpreadsheet\Calculation\Database;
use ReflectionObject;
use TCPDF_FONTS;
use Spatie\Permission\Models\Permission;

class PDFController extends Controller
{


    public function __construct()
    {
//        $this->middleware(['permission:add items']);

    }


    public function orders(Request $request)
    {


        $pdf = new Pdf('l', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Nicola Asuni');
        $pdf->setTitle('الطلبات');
        $pdf->setSubject('TCPDF Tutorial');
        $pdf->setKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setFont('times', 'BI', 12);
        $pdf->AddPage();
        $page_width = $pdf->getPageWidth() - PDF_MARGIN_LEFT - PDF_MARGIN_RIGHT;
        $fontname = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->setFont($fontname, '', 12);

        $date = new Carbon('now');
        $date = $date->format('Y/m/d');
        $pdf->head = function ()use($pdf,$date){
            $pdf->Cell(30, 5, $date, 1, 0, 'C');

        };

        $img = public_path('logo.png');
//        dd($img);
        $pdf->Image($img,25,5,20,20);
        $pdf->setFont($fontname, '', 22);

        $pdf->Cell($page_width, 5, 'دل باستا', 0, 1, 'C');
        $pdf->Cell($page_width, 5, 'الطلبات', 0, 1, 'C');
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 16);
        $pdf->setFillColor(240, 240, 240);
        $table_col_widht = $page_width / 5;
        $pdf->Cell($table_col_widht, 5, 'التاريخ ', 1, 0, 'C', fill: 1);
        $pdf->Cell($table_col_widht, 5, '', 0, 1, 'C');
        $table_col_widht = $page_width / 7;
        $pdf->Ln();
        $pdf->setFont($fontname, 'b', 10);


        $pdf->Ln();
        $arial = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));

        $qeury = Order::query();
        $delivery_date= $request->get('date');
        $qeury->when($delivery_date,function (\Illuminate\Database\Eloquent\Builder $q) use ($request,$delivery_date){
            $query_date = Carbon::parse($delivery_date)->format('Ymd');
            $q->whereRaw("Date(created_at) =  ? Or Date(delivery_date) =  ? ",[$query_date,$query_date]);
        });

        $orders=  $qeury->get();
        $html = '
<table   cellpadding="1">
    <thead>
        <tr style="background-color: #cccccc;">
            <th>اسم العملي </th>4
            <th> اجمالي المبلغ</th>
            <th> المدفوع</th>
            <th>تاريخ التسليم </th>
            <th> العنوان</th>
            <th> رسوم التوصيل</th>
            <th>  تاريخ الطلب</th>
            <th>الحاله</th>
        </tr>
    </thead>
    <tbody>';

// Populate table with data
        foreach ($orders as $order) {
            $customerName = $order->customer ? $order->customer->name : 'N/A';
            $html .= '<tr>
        <td style="border-bottom: 1px solid blue">' . $customerName . '</td>
        <td style="border-bottom: 1px solid blue">' . $order->totalAmount() . '</td>
        <td style="border-bottom: 1px solid blue">' . number_format($order->amount_paid, 2) . '</td>
        <td style="border-bottom: 1px solid blue">' . ($order->delivery_date ? $order->delivery_date: 'N/A') . '</td>
        <td style="border-bottom: 1px solid blue">' . $order?->customer?->address . '</td>
        <td style="border-bottom: 1px solid blue">' . $order?->delivery_fee . '</td>
        <td style="border-bottom: 1px solid blue">' . $order?->created_at->format('Y-m-d H:i') . '</td>
        <td style="border-bottom: 1px solid blue">' . ucfirst($order->status) . '</td>
    </tr>';
        }

        $html .= '</tbody></table>';

// Print HTML table in PDF
        $pdf->writeHTML($html, true, false, true, false, '');




        $pdf->setFont($fontname, 'b', 10);
        $total = 0;
        $expireDateSelected = $request->get('date') ?? null;
        $date = new \DateTime($expireDateSelected);
        $index = 0;
        /** @var Item $item */
        $code_num = 1;

        $pdf->Ln();

        $pdf->Output('example_003.pdf', 'I');
        $code_num++;
    }
    public function printSale(Request $request)
    {
        //سعدنا بزيارتكم اسم العميل نتمني لكم دوام الصحه والعافيه

        $order = Order::find($request->get('order_id'));
         $totalChildren = $order->mealOrders->reduce(function ($prev,$curr){
            return $prev + $curr->requestedChildMeals->count();
        },0);
        $count =  $order->mealOrders->count();
        $custom_layout = array(80, 120 + ($count * 5)*2 + ($totalChildren * 5)) ;
        $pdf = new Pdf('portrait', PDF_UNIT, $custom_layout, true, 'UTF-8', false);
        $lg = array();
        $lg['a_meta_charset'] = 'UTF-8';
        $lg['a_meta_dir'] = 'rtl';
        $lg['a_meta_language'] = 'fa';
        $lg['w_page'] = 'page';
        $pdf->setLanguageArray($lg);
        $lg = array();

        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('alryyan mahjoob');
        $pdf->setTitle('ticket');
        $pdf->setSubject('ticket');
        $pdf->setMargins(0, 0, 10);
//        $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
//        $pdf->setFooterMargin(0);
        $page_width = 65;
//        echo  $pdf->getPageWidth();
        $arial = TCPDF_FONTS::addTTFfont(public_path('arial.ttf'));
        $pdf->AddPage();
        $settings= Settings::all()->first();
        $img_base64_encoded =  $settings->header_base64;
        $img = base64_decode(preg_replace('#^data:image/[^;]+;base64,#', '', $img_base64_encoded));
        if ($settings->is_logo ){
            $pdf->Image("@".$img, 50 , 0, 80, 20,align: 'C',fitbox: 1);

        }

        $pdf->setAutoPageBreak(TRUE, 0);
        $pdf->setMargins(5, 0, 10);

        //$pdf->Ln(25);
        $pdf->SetFillColor(240, 240, 240);

        $pdf->SetFont($arial, '', 7, '', true);
        $pdf->Cell(60,5,$order->created_at->format('Y/m/d H:i A'),0,1);

        $pdf->SetFont($arial, 'u', 10, '', true);
        $pdf->Ln(10);

        $pdf->Cell($page_width,5,$settings->hospital_name,0,1,'C');
//        $pdf->Cell($page_width,5,'مسقط - عمان',0,1,'C');
        $pdf->SetFont($arial, '', 10, '', true);
        $pdf->SetFont($arial, '', 7, '', true);

        $colWidth = $page_width/3;
        $pdf->Cell($page_width,5,'  فاتوره Invoice',0,1,'C',fill: 1);
//        $pdf->Cell($page_width,5,'VATIN '.$settings->vatin,0,1,'C',fill: 0);
        $pdf->Cell(15,5,'رقم الطلب :',0,0);
        $pdf->Cell(35,5,$order->id,0,0,'C');
        $pdf->Cell(15,5,'Oder No :',0,1,'L');

        $pdf->Cell(15,5,'التاريخ :',0,0);
        $pdf->Cell(35,5,$order->created_at->format('Y-m-d H:i A'),0,0,'');
        $pdf->Cell(15,5,'Date :',0,1,'L');

        $pdf->Cell(15,5,'المستخدم :',0,0);
        $pdf->Cell(35,5,$order->user->username,0,0,'C');
        $pdf->Cell(15,5,'User :',0,1,'L');

        $pdf->Cell(15,5,'اسم العميل :',0,0);
        $pdf->Cell(35,5,$order->customer->name ?? 'Default Client',0,0,'C');
        $pdf->Cell(15,5,'To :',0,1,'L');

        $pdf->Cell(15,5,'هاتف العميل  :',0,0);
        $pdf->Cell(35,5,$order?->customer?->phone ,0,0,'C');
        $pdf->Cell(15,5,'To :',0,1,'L');

        $pdf->Cell(15,5,'  ا :',0,0);
        $pdf->Cell(35,5,$order?->customer?->phone ,0,0,'C');
        $pdf->Cell(15,5,'To :',0,1,'L');

//        $pdf->Ln();
//        $pdf->Cell(15,5,'Date',0,0);

//        $pdf->Ln();
        $pdf->SetFont($arial, 'u', 10, '', true);

//        $pdf->Cell(25,5,'Requested Items',0,1,'L');

        $pdf->SetFont($arial, '', 8, '', true);
        $colWidth = $page_width/4;

        /** @var OrderMeal $orderMeal */
        foreach ($order->mealOrders as $orderMeal){
            $pdf->Cell($page_width,5,$orderMeal->meal->name.' ',1,1,fill: 1,stretch: 1);
            $colWidth = $page_width/3;

            $pdf->Cell($colWidth*2,5,'الخدمه','TB',0,fill: 0);
            $pdf->Cell($colWidth/2,5,'العدد','TB',0,fill: 0);
            $pdf->Cell($colWidth/2,5,'السعر','TB',1,fill: 0);
            /** @var RequestedChildMeal $requestedChildMeal */
            foreach ($orderMeal->requestedChildMeals as $requestedChildMeal){
                $pdf->Cell($colWidth*2,5,$requestedChildMeal->childMeal->name,'TB',0,fill: 0);
                $pdf->Cell($colWidth/2,5,$requestedChildMeal->quantity,'TB',0,fill: 0);
                $pdf->Cell($colWidth/2,5,$requestedChildMeal->price,'TB',1,fill: 0);

            }
            $pdf->Ln();
        }
//

        $pdf->Ln();
        $style = array(
            'position' => 'C',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );




//        $pdf->Ln();
//        $pdf->write1DBarcode("$order->id", 'C128', '', '', '40', 18, 0.4, $style, 'N');
//        $pdf->Ln();
        $cols = $page_width / 6;
        $y = $pdf->GetY();
        $pdf->setLineWidth(1);
        $pdf->Line(5,$y,$page_width +5 ,$y);
//                $pdf->Ln();
        $pdf->setLineWidth(0.5);

        $pdf->Cell(20,5,'المجموع','TB',0,'C',fill: 0);
        $pdf->Cell(20,5,$order->totalPrice() ,'TB' ,0,'C',0);
        $pdf->Cell(20 ,5,'Total','TB',1,'C',fill: 0);

        $pdf->Cell(20,5,'المدفوع','TB',0,'C',fill: 0);
        $pdf->Cell(20,5,$order->amount_paid ,'TB' ,0,'C',0);
        $pdf->Cell(20 ,5,'Paid','TB',1,'C',fill: 0);





        $pdf->Cell(20,5,'الدفع',0,0,'C',fill: 0);
        $pdf->Cell(20,5,$order->payment_type ,0 ,0,'C',0);

        $pdf->Cell(20 ,5,'Payment',0,1,'C',fill: 0);
        $pdf->Cell(20,5,'حاله التوصيل',0,0,'C',fill: 0);
        $pdf->Cell(20,5,$order->is_delivery ? 'نعم':'لا' ,0 ,0,'C',0);

        $pdf->Cell(20 ,5,'Delivery',0,1,'C',fill: 0);
        $y = $pdf->GetY();
        $pdf->setLineWidth(1);
        $pdf->Line(5,$y,$page_width +5 ,$y);





        $pdf->Cell($page_width,5,'CR'.$settings->cr,0,1,'C');
        $pdf->Cell($page_width,5,'GSM'.$settings->phone,0,1,'C');
        $pdf->Cell($page_width,5,'Email:'.$settings->email,0,1,'C');
        $pdf->Cell( $page_width,5,$settings->address.'  Address',0,1,'C');


        if ($request->has('base64')) {
            if ($request->get('base64')== 2){
                $result_as_bs64 = $pdf->output('name.pdf', 'S');
                Whatsapp::sendPdf($result_as_bs64, $order->customer->phone);
            }else{
                $result_as_bs64 = $pdf->output('name.pdf', 'E');
                return $result_as_bs64;
            }


        } else {
            $pdf->output();

        }

    }

}
