<?php
namespace App\Http\Traits;

trait ResponseTrait {
public function SuccessResponse( $msg, $data = null){
    return response([
        'success' => 'sucess',
        'message' => $msg,
        'data' => $data,
    ]);

}
public function ErrorResponse( $msg, $data = null){
    return response([
        'error' => 'error',
        'message' => $msg,
        'data' => $data,
    ]);

} 
}
?>