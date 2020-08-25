<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class DBgetter extends Controller
{
    // ####### Startansicht der index.blade mit allen Daten ##########
    public function getData()
    {
        $dbdata = \App\projectTask::all();
        //dd($dbdata);
        return view('/tasks.index', ['status' => array('dbdata' => $dbdata, 'selectedM' => '')]);
    }

    //########### Ansicht der index.blade wenn Monate ausgewählt wurden (GO TO) auch "alle Monate" ######
    public function selMonth(Request $request, $id = false)
    {
        //dd($request ->sel_month);
        $selmonth = $request->input('sel_month');
        //dd($selmonth);

        if ($selmonth == '00') {
            //echo "Hallo OO";
            $sel_month = \App\projectTask::all();
            return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        } elseif ($request->input('to_month')) {
            //echo $selmonth;
            $sel_month = \App\projectTask::where('deadline', '>=', date('Y') . '-' . $selmonth . '-01')
                ->where('deadline', '<=', date('Y') . '-' . $selmonth . '-31')
                ->get();
            //dd($sel_month);
            return view('/tasks.index', ['status' => array('dbdata' => $sel_month, 'selectedM' => $selmonth)]);
        }
    }

    public function dbSync(Request $request, $id = false)
    {
        $json = '[{"_id":"5f43ae8bb630d2282910a705","index":0,"guid":"f191642b-a0a3-4df7-b0b8-4de13ae1f470","isActive":true,"balance":"$2,339.64","picture":"http://placehold.it/32x32","age":21,"eyeColor":"blue","name":"Connie King","gender":"female","company":"FLUM","email":"connieking@flum.com","phone":"+1 (996) 401-3078","address":"685 Foster Avenue, Lutsen, Kentucky, 407","about":"Aliquip labore ipsum qui ea. Eiusmod adipisicing occaecat ad ex consequat elit amet. Pariatur in in magna nostrud labore id commodo ex.\r\n","registered":"2017-12-24T06:29:21 -01:00","latitude":52.215341,"longitude":79.779922,"tags":["voluptate","non","anim","officia","eu","ut","voluptate"],"friends":[{"id":0,"name":"Bethany Rush"},{"id":1,"name":"Shelby Wilkinson"},{"id":2,"name":"Beatrice Moreno"}],"greeting":"Hello, Connie King! You have 3 unread messages.","favoriteFruit":"apple"},{"_id":"5f43ae8bcf5ff255c8d89d03","index":1,"guid":"437b7c25-30c6-4512-9736-a93221cac46c","isActive":false,"balance":"$1,815.90","picture":"http://placehold.it/32x32","age":36,"eyeColor":"green","name":"Alvarado Taylor","gender":"male","company":"GEOFORM","email":"alvaradotaylor@geoform.com","phone":"+1 (925) 534-3550","address":"552 Llama Court, Jamestown, Pennsylvania, 821","about":"Enim veniam ea consequat quis sint eu nostrud est dolore quis nulla dolor ea. Ut Lorem velit eiusmod id adipisicing fugiat. Nisi excepteur id consectetur magna nostrud officia nisi nulla id sit. Esse ad minim mollit nostrud quis tempor reprehenderit. Irure et occaecat ad reprehenderit cupidatat. Veniam cupidatat ad nostrud ut dolore.\r\n","registered":"2019-08-17T12:36:01 -02:00","latitude":49.378274,"longitude":-73.302871,"tags":["consectetur","enim","sunt","Lorem","officia","enim","nostrud"],"friends":[{"id":0,"name":"Janna Woodard"},{"id":1,"name":"Veronica Ford"},{"id":2,"name":"Beard Bishop"}],"greeting":"Hello, Alvarado Taylor! You have 3 unread messages.","favoriteFruit":"apple"},{"_id":"5f43ae8b434917220a1feee1","index":2,"guid":"47dd3f5f-75d4-441a-9a2c-1d8be6082f40","isActive":false,"balance":"$1,373.56","picture":"http://placehold.it/32x32","age":39,"eyeColor":"green","name":"Dorsey Mercado","gender":"male","company":"IZZBY","email":"dorseymercado@izzby.com","phone":"+1 (816) 406-3273","address":"866 Bokee Court, Harleigh, Hawaii, 4956","about":"Qui pariatur ullamco eiusmod Lorem officia cupidatat eu ad velit ad culpa. Excepteur minim fugiat aute id culpa minim voluptate sint veniam sit laboris voluptate. Consequat exercitation magna aliquip deserunt elit proident in irure voluptate pariatur voluptate culpa veniam.\r\n","registered":"2019-06-08T03:48:23 -02:00","latitude":-57.275527,"longitude":-140.087963,"tags":["ex","amet","enim","ea","deserunt","exercitation","esse"],"friends":[{"id":0,"name":"Weber Guerra"},{"id":1,"name":"Oneal Lambert"},{"id":2,"name":"Vaughn Mcfarland"}],"greeting":"Hello, Dorsey Mercado! You have 8 unread messages.","favoriteFruit":"strawberry"},{"_id":"5f43ae8b2c59bbcb1a38f729","index":3,"guid":"011249ca-f79f-41c0-8f4c-8188beb940b2","isActive":true,"balance":"$1,606.27","picture":"http://placehold.it/32x32","age":23,"eyeColor":"brown","name":"Bryan Holcomb","gender":"male","company":"HINWAY","email":"bryanholcomb@hinway.com","phone":"+1 (832) 420-3453","address":"550 Channel Avenue, Waverly, Florida, 6444","about":"Ea et exercitation aliquip minim consequat. Nulla deserunt ad dolore ex eu nulla et laborum voluptate sunt proident sunt dolor exercitation. Ad duis voluptate cupidatat enim cupidatat elit aute dolore ut ad veniam amet id veniam. Sint consequat amet dolor duis irure cillum sunt ut proident ullamco.\r\n","registered":"2015-12-26T07:21:24 -01:00","latitude":89.801761,"longitude":-56.999093,"tags":["Lorem","minim","nostrud","voluptate","enim","sint","ea"],"friends":[{"id":0,"name":"Munoz Spears"},{"id":1,"name":"Kristin Whitney"},{"id":2,"name":"Donna Strickland"}],"greeting":"Hello, Bryan Holcomb! You have 5 unread messages.","favoriteFruit":"banana"},{"_id":"5f43ae8beef095b3d76b0c50","index":4,"guid":"20b2d78d-f9dc-4686-a0ed-f0cdf07d1304","isActive":false,"balance":"$1,477.80","picture":"http://placehold.it/32x32","age":38,"eyeColor":"blue","name":"Wanda Moss","gender":"female","company":"ZILPHUR","email":"wandamoss@zilphur.com","phone":"+1 (905) 568-3873","address":"116 Glenmore Avenue, Dundee, Alaska, 8441","about":"Mollit occaecat nisi anim do anim ipsum voluptate consectetur do culpa cillum mollit consectetur do. Ea anim nisi laboris culpa consectetur voluptate ea incididunt voluptate non non tempor laboris duis. Ullamco ipsum voluptate est fugiat nostrud et nisi velit voluptate Lorem fugiat.\r\n","registered":"2018-11-03T04:55:22 -01:00","latitude":-80.354481,"longitude":154.733006,"tags":["deserunt","Lorem","proident","consequat","ut","elit","aute"],"friends":[{"id":0,"name":"Montgomery Hyde"},{"id":1,"name":"Julie Chavez"},{"id":2,"name":"Vega Lindsay"}],"greeting":"Hello, Wanda Moss! You have 10 unread messages.","favoriteFruit":"strawberry"},{"_id":"5f43ae8b2a8e71289450d2dc","index":5,"guid":"5e3d56c5-85f5-477e-aed1-a3196481e0d1","isActive":true,"balance":"$2,506.67","picture":"http://placehold.it/32x32","age":30,"eyeColor":"brown","name":"Monroe Collins","gender":"male","company":"ZYTRAX","email":"monroecollins@zytrax.com","phone":"+1 (853) 447-3953","address":"475 Crystal Street, Nash, Marshall Islands, 2995","about":"Sint laboris aliquip consequat aliquip nostrud consequat adipisicing minim nisi et dolor nisi dolor. Quis aute ipsum quis Lorem eiusmod laborum cupidatat laboris ullamco elit tempor quis enim dolor. Minim cillum qui dolor ullamco. Non labore nisi duis nostrud consequat voluptate in elit aute mollit ex.\r\n","registered":"2019-09-02T12:21:33 -02:00","latitude":25.280465,"longitude":-148.22941,"tags":["exercitation","dolor","elit","eiusmod","enim","laboris","aute"],"friends":[{"id":0,"name":"Rice Molina"},{"id":1,"name":"Maddox Mcguire"},{"id":2,"name":"Nettie Stout"}],"greeting":"Hello, Monroe Collins! You have 4 unread messages.","favoriteFruit":"banana"},{"_id":"5f43ae8bd114b78adefc76b5","index":6,"guid":"4a37aed7-309b-41ec-9660-a731c3a34fbc","isActive":true,"balance":"$1,770.18","picture":"http://placehold.it/32x32","age":23,"eyeColor":"blue","name":"Hurst Macdonald","gender":"male","company":"COSMETEX","email":"hurstmacdonald@cosmetex.com","phone":"+1 (865) 408-3191","address":"348 Hyman Court, Bentley, Colorado, 4200","about":"Aliquip eu elit commodo consequat ullamco et veniam elit officia. Adipisicing sint sit velit amet duis veniam qui labore aliquip. Occaecat do sunt culpa adipisicing deserunt culpa. Reprehenderit magna fugiat amet exercitation excepteur deserunt velit do quis.\r\n","registered":"2019-11-11T01:00:48 -01:00","latitude":-37.260465,"longitude":-169.397865,"tags":["aliquip","laborum","officia","excepteur","proident","aliqua","magna"],"friends":[{"id":0,"name":"Pittman Hayes"},{"id":1,"name":"Ramsey Macias"},{"id":2,"name":"Mason Mcclain"}],"greeting":"Hello, Hurst Macdonald! You have 6 unread messages.","favoriteFruit":"banana"}]';
        //dd(json_decode($json));
        $jsondata = json_decode($json);
        //dd($jsondata[0]->_id);
        if($request->input('sync'))
        {
            //dd($id);
            //dd($jsondata[0]); // zeigt bei Bedarf den Array der Json bei index 0 an
            //dd($jsondata[0]->_id); // zeigt bei Bedarf die ID des Arrays bei index 0 an
        $syncWorker = \App\projectTask::find($request->input('sync_hidden_id'));
        //dd($syncWorker);
        $dbID = $syncWorker->id; //holt die Zeilen-ID der projektTasks-DB ab
        //dd($dbID);

            $syncWorker->tasks = $jsondata[$dbID]->_id; // hier muss jeweils noch eine passende Zuordnurg zum Zentralweb-json erstellt werden
            $syncWorker->deadline = $jsondata[$dbID]->_id;
            $syncWorker->shortDescription = $jsondata[$dbID]->about;
            $syncWorker->estHour = $jsondata[$dbID]->_id;
            $syncWorker->totalHour = $jsondata[$dbID]->_id;
            $syncWorker->developer = $jsondata[$dbID]->_id;
            $syncWorker->tester = $jsondata[$dbID]->_id;
            $syncWorker->status = $jsondata[$dbID]->_id;
            $syncWorker->progress = $jsondata[$dbID]->_id;
            $syncWorker->EnDate = $jsondata[$dbID]->_id;
            $syncWorker->pId = $jsondata[$dbID]->_id;
            $syncWorker->pIdNr = $jsondata[$dbID]->_id;
            $syncWorker->KvaId = $jsondata[$dbID]->_id;
        $syncWorker->save();
        }
        //dd($jsondata);
        return redirect()->route('index');
    }
}

