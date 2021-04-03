<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class TimeTableController extends Controller
{

    public function index(Request $request, Response $response): Response
    {
        //$ddl_location1 = $request['ddl_location1'];
        $params = $request->getQueryParams('ddl_location1');
        $ddl_location1 = $params["ddl_location1"];
        $ddl_location2 = $params["ddl_location2"];


        $routtxt = file_get_contents(dirname(__FILE__).'\..\..\data\route.txt');
        $allroute = json_decode($routtxt,true);
        $dispatcher = new \Fisharebest\Algorithm\Dijkstra($allroute);
        $shortestPaths = $dispatcher->shortestPaths($ddl_location1, $ddl_location2); // array()


        $stationtxt = file_get_contents(dirname(__FILE__).'\..\..\data\segments.txt');
        $station = json_decode($stationtxt,true);

        $s = uksort($station, 'strcasecmp');
        
        $segments=[];
        foreach($shortestPaths as $routei) {        // Check dimension of route
            foreach ($routei as $node) {
                if ($node != 'Select Location') {
                    $StationName = $station[$node];
                    array_push($segments,["naziv"=>$StationName,"sifra"=>$node]);
                }
            }
        }

        return $this->view->render($response, 'timetable/index.twig', ['route' => $segments, 'ddl_location1'=> $ddl_location1, 'ddl_location2'=> $ddl_location2 ]);

    }
}