<?php

namespace Omnipay\SimplePay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * DoRecurring Response
 */
class DoRecurringResponse extends AbstractResponse implements RedirectResponseInterface {

  public function __construct(RequestInterface $request, $data) {
    $this->request = $request;
    $this->data = $data;
  }

  public function isSuccessful() {
    return empty($this->data['errorCodes']);
  }

}
