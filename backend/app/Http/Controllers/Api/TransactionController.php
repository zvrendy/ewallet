<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->query('limit') ? $request->query('limit') : 10;

        $user = auth()->user();

        $relations = [
            'product',
            'paymentMethod:id,name,code,thumbnail',
            'transactionType:id,name,code,action,thumbnail'
        ];

        $transactions = Transaction::with($relations)
            ->where('user_id', $user->id)
            ->where('status', 'success')
            ->orderBy('id', 'desc')
            ->paginate($limit)->toArray();

        // $transactions->getCollection()->transform(function ($item) {

        //     $paymentMethodThumbnail = $item->paymentMethod->thumbnail ?
        //         url('banks/' . $item->paymentMethod->thumbnail) : '';
        //     $item->paymentMethod = clone $item->paymentMethod;
        //     $item->paymentMethod->thumbnail = $paymentMethodThumbnail;
        //     $transactionType = $item->transactionType;
        //     $item->transactionType->thumbnail = $transactionType->thumbnail ?
        //         url('transaction-type/' . $transactionType->thumbnail) : '';


        //     return $item;
        // });

        $transactions['data'] = array_map(function ($item) {

            $item['payment_method']['thumbnail'] = $item['payment_method']['thumbnail'] ? url('banks/' . $item['payment_method']['thumbnail']) : "";

            $item['transaction_type']['thumbnail'] = $item['transaction_type']['thumbnail'] ? url('transaction-type/' . $item['transaction_type']['thumbnail']) : "";

            return $item;
        }, $transactions['data']);

        return response()->json($transactions);
    }
}
