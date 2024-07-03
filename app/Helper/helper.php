<?php
function cartArray(){
    $cartCollection = Cart::getcontent();
    return $cartCollection->toArray();
}
