<?php
namespace App\Helper ;

class Helper
{
    public static function responseJson($status, $massage, $data = null)
    {
        if ($data == null) {
            $response =
                [
                    'status' => (int)$status,
                    'massage' => $massage
                ];
        } else {
            $response =
                [
                    'status' => (int)$status,
                    'massage' => $massage,
                    'data' => $data
                ];
        }

        return response()->json($response);
    }

    public static function responseJsonNew($draw, $recordsTotal, $recordsFiltered, $data = null)
    {
        if ($data == null) {
            return 'stop';
        } else {
            $response =[
            'draw'=>$draw ,
            'recordsTotal'=>$recordsTotal ,
            'recordsFiltered'=>$recordsFiltered ,
            'data'=>$data ,
            ];
        }

        return response()->json($response);
    }
}
