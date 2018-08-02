<?php
/**
 * Created by PhpStorm.
 * User: akshatsharma
 * Date: 8/2/18
 * Time: 3:30 PM
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use be\kunstmaan\multichain\MultichainClient;
use Illuminate\Support\Facades\App;
use PhpParser\Node\Expr\AssignOp\Mul;
use stdClass;

class ChainController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = new MultichainClient(env('chain_url'), env('chain_user'), env('chain_password'), 3);
    }

    public function test()
    {
        //$client = new MultichainClient(env('chain_url'), env('chain_user'), env('chain_password'), 3);
        return $address = $this->client->setDebug(true)->getNewAddress();
    }

    public function getinfo()
    {
        $client = new MultichainClient(env('chain_url'), env('chain_user'), env('chain_password'), 3);
        return $address = $client->setDebug(true)->getInfo();
    }

    public function liststreams()
    {
        //$client = new MultichainClient(env('chain_url'), env('chain_user'), env('chain_password'), 3);
        return $address = $this->client->setDebug(true)->liststreams();
    }

    public function createstream($stream_name)
    {
        //$client = new MultichainClient(env('chain_url'), env('chain_user'), env('chain_password'), 3);
        return $address = $this->client->setDebug(true)->createstream($stream_name);
    }

    public function createfromaddress($stream_name)
    {
        //$client = new MultichainClient(env('chain_url'), env('chain_user'), env('chain_password'), 3);
        $address = '1aobUgPuYuVYpGFTbQwD2ZenkwCNfofQu2DLFD';
        return $address = $this->client->setDebug(true)->createfromaddress($address,$stream_name);
    }

    public function publish(){
        $address = '1aobUgPuYuVYpGFTbQwD2ZenkwCNfofQu2DLFD';
        $stream_name = "stream1";
        $key='1';

        //$json = '{ "foo": "world", "number": 43 }';

        $stdclass = new stdClass();
        $stdclass->name = "Akshat Sharma";
        $stdclass->email = "akshat+u1@gmail.com";
        $stdclass->password = "mnasbdabsd8768768787";
        $myJSON = json_encode($stdclass);

        return $address = $this->client->setDebug(true)->publishfrom($address,$stream_name,$key,$myJSON);

    }

    public function liststreamkeyitems(){
        $address = '1aobUgPuYuVYpGFTbQwD2ZenkwCNfofQu2DLFD';
        $stream_name = "stream1";
        $key='1';

        $address = $this->client->setDebug(true)->liststreamkeyitems($stream_name,$key);

        foreach ($address as $key=>$item){
            $address[$key]['data'] = $this->client->hex2String($item['data']);
        }

        return $address;

    }

    public function liststreamitems()
    {
        $stream_name = "stream1";
        //$client = new MultichainClient(env('chain_url'), env('chain_user'), env('chain_password'), 3);
        return $address = $this->client->setDebug(true)->liststreamitems($stream_name);
    }


}