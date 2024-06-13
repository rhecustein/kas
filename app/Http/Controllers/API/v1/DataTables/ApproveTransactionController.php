<?php
namespace App\Http\Controllers\API\v1\DataTables;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedNotify;
use App\Models\CashTransaction;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApproveTransactionController extends Controller
{


    public function approved(Request $request):JsonResponse
    {

           $transaction = CashTransaction::find($request->id);
            if(!$transaction){
                throw new HttpResponseException(response()->json([
                    "message"=>"not found."
                ])->setStatusCode(404));
            }

            if(!is_null($transaction -> student -> email)){
                Mail::to($transaction -> student -> email)
                ->send(new ApprovedNotify($transaction->student->username));
            }
            $transaction->approved = true;
            $transaction->save();

            return response()->json([
                'code' => Response::HTTP_OK,
                'message' => 'success',
                'data' => $transaction,
            ], Response::HTTP_OK);
    }


}
