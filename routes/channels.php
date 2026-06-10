<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});

/*
 * Live delivery tracking for a single order. Authorized for:
 *  - the customer who placed the order   (api / web guard  -> User)
 *  - the seller who owns the order        (seller/seller-api -> Seller)
 *  - any admin                            (admin guard       -> Admin)
 */
Broadcast::channel('order.{orderId}', function ($user, $orderId) {
    $order = \App\Models\Order::find($orderId);
    if (!$order) {
        return false;
    }

    if ($user instanceof \App\Models\Admin) {
        return true;
    }
    if ($user instanceof \App\Models\Seller) {
        return (int) $order->seller_id === (int) $user->getMainSellerId();
    }
    if ($user instanceof \App\Models\User) {
        return (int) $order->user_id === (int) $user->id;
    }

    return false;
});

