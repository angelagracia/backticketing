<?php

// app/helpers.php
if (!function_exists('getBroadcastingUser')) {
    function getBroadcastingUser() {
        if (auth()->guard('bo')->check()) {
            return auth()->guard('bo')->user();
        } elseif (auth()->guard('portal')->check()) {
            return auth()->guard('portal')->user();
        }
        return null;
    }
}
