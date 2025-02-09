<?php
namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report1($pid)
    {
        // Fetch Payment
        $payment = Payment::find($pid);
        if (!$payment) {
            return abort(404, 'Payment not found.');
        }

        // Check for enrollment
        if (!$payment->enrollment) {
            return abort(404, 'Enrollment not found for this payment.');
        }

        // Check for batch
        if (!$payment->enrollment->batch) {
            return abort(404, 'Batch not found for this enrollment.');
        }

        // Check if Auth user exists
        $printedBy = Auth::check() ? Auth::user()->name : 'Unknown';

        // Generate the receipt HTML
        $print = "<div style='margin:20px; padding:20px; font-family: Arial, sans-serif;'>";
        $print .= "<h1 align='center'>Payment Receipt</h1>";
        $print .= "<hr/>";
        $print .= "<p> <b>Receipt No:</b> " . $pid . "</p>";
        $print .= "<p> <b>Date:</b> " . ($payment->paid_date ?? 'N/A') . "</p>";
        $print .= "<p> <b>Enrollment No:</b> " . ($payment->enrollment->enroll_no ?? 'N/A') . "</p>"; 
        $print .= "<p> <b>Student Name:</b> " . ($payment->enrollment->student->name ?? 'N/A') . "</p>";
        $print .= "<hr/>";

        // Payment Details Table
        $print .= "<table style='width: 100%; border-collapse: collapse;' border='1'>";
        $print .= "<tr><th style='padding:8px;'>Description</th><th style='padding:8px;'>Amount</th></tr>";
        $print .= "<tr><td style='padding:8px;'><h3>" . ($payment->enrollment->batch->name ?? 'N/A') . "</h3></td>";
        $print .= "<td style='padding:8px;'><h3>" . number_format($payment->amount, 2) . "</h3></td></tr>";
        $print .= "</table>";
        $print .= "<hr/>";

        // Footer
        $print .= "<p> <b>Printed By:</b> " . $printedBy . "</p>";
        $print .= "<p> <b>Printed Date:</b> " . date('Y-m-d') . "</p>";
        $print .= "</div>";

        // Generate PDF
        $pdf = Pdf::loadHTML($print);
        return $pdf->stream('payment_receipt.pdf');
    }
}
?>
