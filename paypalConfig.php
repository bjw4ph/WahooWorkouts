<?php
    /*
        * Config for PayPal specific values
    */

    //Whether Sandbox environment is being used, Keep it true for testing
    define("SANDBOX_FLAG", true);

    //PayPal REST API endpoints
    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
    define("LIVE_ENDPOINT", "https://api.paypal.com");

    //Merchant ID
    define("MERCHANT_ID","2264680088514844206");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("SANDBOX_CLIENT_ID" , "AVju_Z_HdfgWXaGqEYUOf1-VREm2TM2AXrSoDjYIc3jksbWOpuh-v5Zatu23C2-NuXkG2-l_d22pjTke");
    define("SANDBOX_CLIENT_SECRET", "EGC66giXBJP0jYz_2gancRvTIuDKD3hwxTXP9quaddSTr0EZXHF9iT4-4SC0WWV7d7jzo4Cd7Y87lN8w");

    //Environments -Sandbox and Production/Live
    define("SANDBOX_ENV", "sandbox");
    define("LIVE_ENV", "production");

    //PayPal REST App SANDBOX Client Id and Client Secret
    define("LIVE_CLIENT_ID" , "live_Client_Id");
    define("LIVE_CLIENT_SECRET" , "live_Client_Secret");

    //ButtonSource Tracker Code
    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");

?>