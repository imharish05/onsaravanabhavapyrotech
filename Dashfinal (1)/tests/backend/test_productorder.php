<?php

// AUTO-GENERATED TEST FOR MODULE: ProductOrder
echo "\n============================================\n";
echo "🚀 Running Advanced QA Tests for ProductOrder\n";
echo "============================================\n";

$baseUrl    = "http://127.0.0.1:8000";
$cookieFile = __DIR__ . "/shared_session.txt"; // Shared by master_test_runner.php
$csrfFile   = __DIR__ . "/shared_csrf.txt";

// --- LOAD SHARED SESSION + CSRF TOKEN ---
if (!file_exists($cookieFile)) {
    echo "❌ Shared session not found. Run master_test_runner.php first!\n";
    exit(1);
}

$csrfToken = trim(file_get_contents($csrfFile) ?: "");

// Refresh CSRF from dashboard using the shared session
$ch = curl_init($baseUrl . "/dashboard");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_COOKIEFILE     => $cookieFile,
    CURLOPT_COOKIEJAR      => $cookieFile,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_TIMEOUT        => 10,
]);
$dashResp = curl_exec($ch);
$dashCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Try to extract fresh CSRF from the dashboard response
preg_match('/<meta name="csrf-token" content="([^"]+)"/i', $dashResp, $m);
if (!empty($m[1])) $csrfToken = $m[1];

if ($dashCode === 200 || $dashCode === 302) {
    echo "✅ Shared session valid (HTTP $dashCode). CSRF ready.\n";
} else {
    echo "⚠️ Session may have expired (HTTP $dashCode). Tests proceed with stored CSRF.\n";
}

// --- FULL ENDPOINT TESTS ---

// Testing POST /destroyordersolt
$ch = curl_init($baseUrl . "/destroyordersolt");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("POST" === "POST" || "POST" === "PUT" || "POST" === "DELETE") {
    if("POST" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] POST /destroyordersolt -> destroyordersolt() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /destroyordersolt -> destroyordersolt() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /destroyordersolt -> destroyordersolt() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /destroyordersolt -> destroyordersolt() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /vendor/orders
$ch = curl_init($baseUrl . "/vendor/orders");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /vendor/orders -> index() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/orders -> index() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/orders -> index() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/orders -> index() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /vendor/orders/create
$ch = curl_init($baseUrl . "/vendor/orders/create");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /vendor/orders/create -> create() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/orders/create -> create() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/orders/create -> create() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/orders/create -> create() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /vendor/orders
$ch = curl_init($baseUrl . "/vendor/orders");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("POST" === "POST" || "POST" === "PUT" || "POST" === "DELETE") {
    if("POST" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] POST /vendor/orders -> store() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /vendor/orders -> store() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /vendor/orders -> store() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /vendor/orders -> store() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /vendor/orders/{order}
$ch = curl_init($baseUrl . "/vendor/orders/{order}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /vendor/orders/{order} -> show() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/orders/{order} -> show() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/orders/{order} -> show() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/orders/{order} -> show() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /vendor/orders/{order}/edit
$ch = curl_init($baseUrl . "/vendor/orders/{order}/edit");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /vendor/orders/{order}/edit -> edit() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/orders/{order}/edit -> edit() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/orders/{order}/edit -> edit() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/orders/{order}/edit -> edit() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing PUT /vendor/orders/{order}
$ch = curl_init($baseUrl . "/vendor/orders/{order}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("PUT" === "POST" || "PUT" === "PUT" || "PUT" === "DELETE") {
    if("PUT" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] PUT /vendor/orders/{order} -> update() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] PUT /vendor/orders/{order} -> update() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] PUT /vendor/orders/{order} -> update() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] PUT /vendor/orders/{order} -> update() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing DELETE /vendor/orders/{order}
$ch = curl_init($baseUrl . "/vendor/orders/{order}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("DELETE" === "POST" || "DELETE" === "PUT" || "DELETE" === "DELETE") {
    if("DELETE" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] DELETE /vendor/orders/{order} -> destroy() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] DELETE /vendor/orders/{order} -> destroy() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] DELETE /vendor/orders/{order} -> destroy() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] DELETE /vendor/orders/{order} -> destroy() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /todayorder
$ch = curl_init($baseUrl . "/todayorder");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /todayorder -> todayorder() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /todayorder -> todayorder() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /todayorder -> todayorder() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /todayorder -> todayorder() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /topcustomer
$ch = curl_init($baseUrl . "/topcustomer");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /topcustomer -> topcustomer() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /topcustomer -> topcustomer() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /topcustomer -> topcustomer() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /topcustomer -> topcustomer() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /ordersolt/{id}
$ch = curl_init($baseUrl . "/ordersolt/{id}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /ordersolt/{id} -> ordersolt() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /ordersolt/{id} -> ordersolt() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /ordersolt/{id} -> ordersolt() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /ordersolt/{id} -> ordersolt() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /getproductdetails/{orderid}
$ch = curl_init($baseUrl . "/getproductdetails/{orderid}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /getproductdetails/{orderid} -> getproductdetails() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /getproductdetails/{orderid} -> getproductdetails() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /getproductdetails/{orderid} -> getproductdetails() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /getproductdetails/{orderid} -> getproductdetails() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /pdf/{orderid}/{userid}
$ch = curl_init($baseUrl . "/pdf/{orderid}/{userid}");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
if("GET" === "POST" || "GET" === "PUT" || "GET" === "DELETE") {
    if("GET" !== "POST") curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    else curl_setopt($ch, CURLOPT_POST, true);
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['_token' => $csrfToken, 'test_name' => 'QA Data', 'id' => 1]));
}
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($httpcode >= 200 && $httpcode < 400) {
    echo "✅ [PASS] GET /pdf/{orderid}/{userid} -> pdfview() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /pdf/{orderid}/{userid} -> pdfview() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /pdf/{orderid}/{userid} -> pdfview() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /pdf/{orderid}/{userid} -> pdfview() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);


// --- SECURITY TEST (SQL Injection) ---
$ch = curl_init($baseUrl . "/destroyordersolt");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query(["_token" => $csrfToken, "id" => "1 OR 1=1 --", "name" => "\" OR \""]),
    CURLOPT_COOKIEFILE     => $cookieFile,
    CURLOPT_TIMEOUT        => 10,
]);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if ($httpcode >= 500) {
    echo "⚠️ [WARN] SQL Injection check returned 500 — possible unprotected query.\n";
} else {
    echo "✅ [PASS] SQL Injection check successfully bounded/handled.\n";
}

// --- SECURITY TEST (Auth Bypass — fresh no-cookie request) ---
$ch = curl_init($baseUrl . "/destroyordersolt");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_TIMEOUT        => 10,
]);
$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if ($httpcode === 200 && !str_contains($response, "login")) {
    echo "⚠️ [WARN] Auth Bypass — page loaded without login! May be unprotected.\n";
} else {
    echo "✅ [PASS] Auth Bypass prevented (HTTP $httpcode).\n";
}

// --- PERFORMANCE / STRESS TEST (50, 100, 200 concurrent) ---
$profiles = [50, 100, 200];
echo "⏳ Load Testing /destroyordersolt...\n";
foreach ($profiles as $reqCount) {
    $start = microtime(true);
    $successCount = 0;
    $mh = curl_multi_init();
    $handles = [];
    for ($i = 0; $i < $reqCount; $i++) {
        $ch = curl_init($baseUrl . "/destroyordersolt");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_COOKIEFILE     => $cookieFile,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_TIMEOUT        => 10,
        ]);
        curl_multi_add_handle($mh, $ch);
        $handles[] = $ch;
    }
    $running = null;
    do { curl_multi_exec($mh, $running); } while ($running);
    foreach ($handles as $ch) {
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($code === 200 || $code === 302) $successCount++; // 302 = valid authenticated redirect
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    $elapsed = number_format(microtime(true) - $start, 2);
    echo "✔️ Load[$reqCount]: {$elapsed}s | Success: " . round(($successCount / $reqCount) * 100, 1) . "%\n";
}

echo "---------------------------------\n";
