<?php

namespace App\Interfaces;


interface OrderItemRequestInterface
{
    public function getRequest($user);

    public function getCustomerRequest($user);

    public function getWaitingRequest($user);

    public function getBookedRequest($user);

    public function getBookedRequestByCustomer($user);

    public function isExists($requets);

    public function getResponseById($response);

}