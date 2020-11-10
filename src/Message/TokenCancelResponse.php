<?php

namespace Omnipay\SimplePay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Query Response
 */
class TokenCancelResponse extends AbstractResponse implements RedirectResponseInterface {

  public function __construct(RequestInterface $request, $data) {
    $this->request = $request;
    $this->data = $data;
    // print_r($data);
    // exit;
  }

  public function isSuccessful() {
    return empty($this->data['errorCodes']) && $this->data['status'] == 'cancelled';
  }

  public function isRedirect() {
    return false;
  }

  public function getRedirectData() {
    return null;
  }

}
