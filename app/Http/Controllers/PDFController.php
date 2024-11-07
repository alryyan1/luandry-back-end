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
use App\Models\Package;
use App\Models\Patient;
use App\Models\PrescribedDrug;
use App\Models\RequestedResult;
use App\Models\Service;
use App\Models\Setting;
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


}
