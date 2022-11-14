<?php
function serialize_data($object) {
    $serialized = '';
    if( is_array($object) ) {
        ksort($object); //Sort keys
        foreach($object as $key => $value) {
                if(is_numeric($key)) $serialized .= serialize_data($value); //Array
            else $serialized .= $key . serialize_data($value); //Hash
        }
    } else return $object; //Scalar
    return $serialized;
}

function sign($method, $uuid, $data, $keypath) {
    $plaintext = $method . $uuid . serialize_data($data);
    print_r("<div class='row'><div class='callResult'> -----PLAINTEXT WITHOUT SIGNING-----<br/>");
    print_r($plaintext);
    print_r("</div></div>");
    openssl_sign($plaintext, $signature, $keypath);
    return base64_encode($signature);
}
function uuid()
{
    $chars = md5(uniqid(true));
    $uuid = substr($chars,0,8) . '-';
    $uuid .= substr($chars,8,4) . '-';
    $uuid .= substr($chars,12,4) . '-';
    $uuid .= substr($chars,16,4) . '-';
    $uuid .= substr($chars,20,12);
    return $uuid;
}

function API($method, $params, $environment, $keypath) {
    $uuid = uuid();
    $signature = sign($method, $uuid, $params, $keypath);
    $json_req = json_encode(array(
                'method' => $method,
                'params' => array(
                    'UUID' => $uuid,
                    'Data' => $params,
                    'Signature' => $signature
                ),
                'version' => '1.1'
    ));
    $options = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => json_encode(array(
                'method' => $method,
                'params' => array(
                    'UUID' => $uuid,
                    'Data' => $params,
                    'Signature' => $signature
                ),
                'version' => '1.1'
            ))
        )
    );
    $r = file_get_contents($environment, false, stream_context_create($options));
    
    $r = json_decode($r,true);
    
    print_r("<div class='row'>");
    if ($r['result']['data']['url'])
    {
        
        print_r("<div class='callResult left'>");
        print_r("<iframe style='border: 0px; width:600px!important; height:400px!important;' src='");
        if($_POST['DisableLocalisation'] == '1') {
            $r['result']['data']['url'] .= '&DisableLocalisation=1';
        }
        echo $r['result']['data']['url'];
        print_r("' ></iframe>");
        print_r("<a href='");
        echo $r['result']['data']['url'];
        print_r("' id='trustlyurl' target='new'>TrustlyURL</a><br/><br/>");
        echo $r['result']['data']['url'];
        print_r("</div>");
        print_r("<div class='callResult right'>-----API call json-----<br/><pre>");
    } else {
        print_r("<div class='callResult'>-----API call json-----<br/><pre>");
    }
    $json_req = json_decode($json_req, true);
    echo json_encode($json_req, JSON_PRETTY_PRINT);
    error_log(print_r($json_req,true));
    print_r("</pre></div>");
    print_r("</div>");

$r = file_get_contents($environment, false, stream_context_create($options));
    print_r("<div class='callResult'>-----RESULT JSON -----<br/><pre>");
    $r = json_decode($r, true);
    echo json_encode($r, JSON_PRETTY_PRINT);
    error_log(print_r($r,true));
    print_r("</pre></div>");
}
?>
