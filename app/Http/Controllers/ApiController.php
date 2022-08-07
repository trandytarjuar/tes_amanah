<?php
namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

 
use GuzzleHttp\Client;

class ApiController extends BaseController
{
    public function index()
    {
        $client = new Client();
        $url = "https://jsonplaceholder.typicode.com/posts";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());
        $data["api"]= $responseBody;
        // var_dump($data); die;
        // var_dump($responseBody); die; 
        return view("api", $data);
    }
    public function delete($id)
    {
        $client = new Client();
        $url = "https://jsonplaceholder.typicode.com/posts/$id";
        $req = $client->delete(
            $url,
            [
                    'verify'  => false,
                ]
            );
            // return redirect('api');
        // $response = $client->request('DELETE', $url, [
        //     'verify'  => false,
        // ]);
        // $responseBody = json_decode($response->getBody());

        // var_dump($req); die;
    }
    public function edit(Request $request)
    {
        
        // var_dump($id); die;
        $client = new Client();
        // $request = Services::request();
        $id = $request->id_api;
        var_dump($id); die;
        // $name = Input::get('id');
        $url = "https://jsonplaceholder.typicode.com/posts/$id";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = $response->getBody()->getContents();
        // var_dump($responseBody); die;
        // $responseBody = json_decode($response->getBody());

        echo $responseBody;

        // var_dump($url); die;

    }
}