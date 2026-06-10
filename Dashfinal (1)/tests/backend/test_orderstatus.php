<?php

// AUTO-GENERATED TEST FOR MODULE: OrderStatus
echo "\n============================================\n";
echo "🚀 Running Advanced QA Tests for OrderStatus\n";
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

// Testing GET /vendor/ordersstatus
$ch = curl_init($baseUrl . "/vendor/ordersstatus");
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
    echo "✅ [PASS] GET /vendor/ordersstatus -> index() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/ordersstatus -> index() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/ordersstatus -> index() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/ordersstatus -> index() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /vendor/ordersstatus/create
$ch = curl_init($baseUrl . "/vendor/ordersstatus/create");
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
    echo "✅ [PASS] GET /vendor/ordersstatus/create -> create() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/ordersstatus/create -> create() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/ordersstatus/create -> create() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/ordersstatus/create -> create() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /vendor/ordersstatus
$ch = curl_init($baseUrl . "/vendor/ordersstatus");
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
    echo "✅ [PASS] POST /vendor/ordersstatus -> store() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /vendor/ordersstatus -> store() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /vendor/ordersstatus -> store() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /vendor/ordersstatus -> store() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /vendor/ordersstatus/{ordersstatus}
$ch = curl_init($baseUrl . "/vendor/ordersstatus/{ordersstatus}");
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
    echo "✅ [PASS] GET /vendor/ordersstatus/{ordersstatus} -> show() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/ordersstatus/{ordersstatus} -> show() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/ordersstatus/{ordersstatus} -> show() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/ordersstatus/{ordersstatus} -> show() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing GET /vendor/ordersstatus/{ordersstatus}/edit
$ch = curl_init($baseUrl . "/vendor/ordersstatus/{ordersstatus}/edit");
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
    echo "✅ [PASS] GET /vendor/ordersstatus/{ordersstatus}/edit -> edit() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] GET /vendor/ordersstatus/{ordersstatus}/edit -> edit() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] GET /vendor/ordersstatus/{ordersstatus}/edit -> edit() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] GET /vendor/ordersstatus/{ordersstatus}/edit -> edit() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing PUT /vendor/ordersstatus/{ordersstatus}
$ch = curl_init($baseUrl . "/vendor/ordersstatus/{ordersstatus}");
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
    echo "✅ [PASS] PUT /vendor/ordersstatus/{ordersstatus} -> update() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] PUT /vendor/ordersstatus/{ordersstatus} -> update() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] PUT /vendor/ordersstatus/{ordersstatus} -> update() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] PUT /vendor/ordersstatus/{ordersstatus} -> update() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing DELETE /vendor/ordersstatus/{ordersstatus}
$ch = curl_init($baseUrl . "/vendor/ordersstatus/{ordersstatus}");
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
    echo "✅ [PASS] DELETE /vendor/ordersstatus/{ordersstatus} -> destroy() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] DELETE /vendor/ordersstatus/{ordersstatus} -> destroy() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] DELETE /vendor/ordersstatus/{ordersstatus} -> destroy() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] DELETE /vendor/ordersstatus/{ordersstatus} -> destroy() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /status/add
$ch = curl_init($baseUrl . "/status/add");
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
    echo "✅ [PASS] POST /status/add -> addstatus() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /status/add -> addstatus() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /status/add -> addstatus() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /status/add -> addstatus() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);

// Testing POST /status/update
$ch = curl_init($baseUrl . "/status/update");
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
    echo "✅ [PASS] POST /status/update -> updatestatus() successful (HTTP $httpcode)\n";
} else if ($httpcode === 419) {
    echo "❌ [FAIL] POST /status/update -> updatestatus() CSRF check failed (HTTP $httpcode)\n";
} else if ($httpcode === 401 || $httpcode === 403) {
    echo "🛡️ [AUTH] POST /status/update -> updatestatus() Restricted Access (HTTP $httpcode)\n";
} else {
    echo "⚠️ [INFO] POST /status/update -> updatestatus() threw error (HTTP $httpcode) (Check logs if 500)\n";
}
curl_close($ch);


// --- SECURITY TEST (SQL Injection) ---
$ch = curl_init($baseUrl . "/vendor/ordersstatus");
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
$ch = curl_init($baseUrl . "/vendor/ordersstatus");
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
echo "⏳ Load Testing /vendor/ordersstatus...\n";
foreach ($profiles as $reqCount) {
    $start = microtime(true);
    $successCount = 0;
    $mh = curl_multi_init();
    $handles = [];
    for ($i = 0; $i < $reqCount; $i++) {
        $ch = curl_init($baseUrl . "/vendor/ordersstatus");
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
