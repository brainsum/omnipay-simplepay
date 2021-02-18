<?php

namespace Omnipay\SimplePay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface {

  public function __construct(RequestInterface $request, $data) {
    $this->request = $request;
    $this->data = $data;
  }

  public function isSuccessful() {
    return false;
  }

  public function isRedirect() {
    return true;
  }

  public function getRedirectUrl() {
    return $this->data['paymentUrl'];
  }

  public function getRedirectMethod() {
    return 'GET';
  }

  public function getRedirectData() {
    return null;
  }

}
