<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\Asteroid as AsteroidResource;

class asteroidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //set max execution 0
        ini_set('max_execution_time', 0);
            
        $curl = curl_init();
        $start_date = '2018-01-01';
        $end_date = '2018-01-07';
        $url = "https://api.nasa.gov/neo/rest/v1/feed?start_date=$start_date&end_date=$end_date&api_key=CBQBkHsbc9HxeH0uTRE5aJ41nYH1vYp6qRcBiJwK";
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            // Set Here Your Requesred Headers
            'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $data = [];
            $response = json_decode($response);
            $asteroid_array = [];

            if(!empty($response)) {
                $i = 0;
                foreach( $response->near_earth_objects as $key => $value ){
                    $asteroid_array[$i]['count'] = count($value);
                    $asteroid_array[$i]['date'] = $key;
                    $i++;
                }

                //sort array with asc
                usort($asteroid_array, function($a,$b) {
                    $t1 = strtotime($a['date']);
                    $t2 = strtotime($b['date']);
                    return $t1 - $t2;
                });
                
                $data['line_chart_data'] = array_column($asteroid_array, 'count');
                $data['line_chart_option'] = array_column($asteroid_array, 'date');
                
                $json ['data'] = $data;
                return json_encode($data);
            } else {
                echo "Data not found";
            }    
        }

       //return AsteroidResource::collection($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
