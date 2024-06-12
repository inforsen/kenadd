<?php

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     * 
        $clientId = getenv("CLIENT_ID") ?: "AX1fi48t29QeuCVTqh1KPULGZv3DJIH3UoQecH4RCBPg-Mndz21eAbu0D_VvraeA1DwK-TK0NjL7jRF0";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EIUnbYrKBCCRwjhTsBXYvhFNm80r4p27XmLwrKwh5qviIzVskPrHT6VDHwZO7d0EtK7tNBvTG_5geVot";
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use ProductionEnvironment.
     */
    public static function environment()
    {   
        //$clientId = getenv("CLIENT_ID") ?: "AVMSsfgnmAyZO_CHdd88cjMIY1Z2LJqQx1g4ZvruOikPZq4Utv1XOOZ26UEvCyN8R0XXryOnIUOms1Wu";
        //$clientSecret = getenv("CLIENT_SECRET") ?: "EHfrJkvH4HV9lHR6s7VUcku9H63OZGKept26pIfMur59tzVo6My1kpfKduKnamkTxsWKcc_rUhrPjUTo";
        $clientId = getenv("CLIENT_ID") ?: "AX1fi48t29QeuCVTqh1KPULGZv3DJIH3UoQecH4RCBPg-Mndz21eAbu0D_VvraeA1DwK-TK0NjL7jRF0";
        $clientSecret = getenv("CLIENT_SECRET") ?: "EIUnbYrKBCCRwjhTsBXYvhFNm80r4p27XmLwrKwh5qviIzVskPrHT6VDHwZO7d0EtK7tNBvTG_5geVot";
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}