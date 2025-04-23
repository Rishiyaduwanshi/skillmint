@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="max-w-2xl mx-auto bg-slate-800 rounded-lg shadow-lg border border-slate-700 p-8">
        <h2 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-emerald-400 mb-6">
            Payment for {{ $course->title }}
        </h2>

        <div class="mb-8">
            <h3 class="text-xl text-gray-100 mb-4">Amount to Pay: ₹{{ $course->price }}</h3>
            
            <div class="grid md:grid-cols-2 gap-6">
                <!-- UPI Details -->
                <div class="bg-slate-700 p-4 rounded-lg">
                    <h4 class="text-lg text-cyan-400 mb-3">UPI Payment</h4>
                    <p class="text-gray-300 mb-2">UPI ID: {{ $paymentConfig['upi_id'] }}</p>
                    @if($paymentConfig['upi_QR_code'])
                        <img src="{{ asset('storage/' . $paymentConfig['upi_QR_code']) }}" 
                             alt="UPI QR Code" class="w-full max-w-[200px] mx-auto">
                    @endif
                </div>

                <!-- Bank Details -->
                <div class="bg-slate-700 p-4 rounded-lg">
                    <h4 class="text-lg text-cyan-400 mb-3">Bank Transfer</h4>
                    <div class="text-gray-300 space-y-2">
                        <p>Account Holder: {{ $paymentConfig['account_holder'] }}</p>
                        <p>Bank: {{ $paymentConfig['bank_name'] }}</p>
                        <p>A/C No: {{ $paymentConfig['account_number'] }}</p>
                        <p>IFSC: {{ $paymentConfig['ifsc_code'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('payments.store', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-300 mb-2">Payment Method</label>
                <select name="payment_method" required class="w-full bg-slate-900 text-gray-300 border border-slate-600 rounded-lg px-4 py-2">
                    <option value="UPI">UPI</option>
                    <option value="Bank transfer">Bank Transfer</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-300 mb-2">Upload Payment Receipt</label>
                <input type="file" name="upload_receipt" required 
                       class="w-full bg-slate-900 text-gray-300 border border-slate-600 rounded-lg px-4 py-2">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-emerald-500 text-white px-6 py-3 rounded-lg hover:opacity-90">
                Submit Payment
            </button>
        </form>
    </div>
</div>
@endsection