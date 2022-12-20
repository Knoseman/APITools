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
    print_r(htmlspecialchars($plaintext));
    print_r("</div></div>");
    openssl_sign($plaintext, $signature, $keypath);
    return base64_encode($signature);
}

function onlySign($method, $uuid, $data, $keypath) {
    $plaintext = $method . $uuid . serialize_data($data);
    print_r("<div class='row'><div class='callResult'> -----PLAINTEXT WITHOUT SIGNING-----<br/>");
    print_r(htmlspecialchars($plaintext));
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

function API($method, $params, $environment, $keypath, $uuid) {
    //$uuid = uuid();
    $signature = sign($method, $uuid, $params, $keypath);
    $json_pre_req = array(
                'method' => $method,
                'params' => array(
                    'UUID' => $uuid,
                    'Data' => $params,
                    'Signature' => $signature
                ),
                'version' => '1.1'
    );
    $json_req = json_encode($json_pre_req);
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
    $r_json = file_get_contents($environment, false, stream_context_create($options));
    $r = json_decode($r_json,true);
    
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
    }
    
    print_r("<div class='callResult right'>-----API call json-----<br/><pre>");
    print_r(htmlspecialchars(json_encode($json_pre_req, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)));
    error_log(print_r($json_req,true));
    print_r("</pre></div>");
    print_r("</div>");

    print_r("<div class='callResult'>-----RESULT JSON -----<br/><pre>");
    print_r (json_encode($r, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    error_log(print_r($r,true));
    print_r("</pre></div>");
}
?>
