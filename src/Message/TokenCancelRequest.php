<?php

namespace Omnipay\SimplePay\Message;

/**
 * Query Request
 */
class TokenCancelRequest extends AbstractRequest {

  public function setToken($value) {
    return $this->setParameter('token', $value);
  }

  public function getToken() {
    return $this->getParameter('token');
  }

  public function getEndpoint() {
    return parent::getEndpoint() . 'tokencancel';
  }

  protected function createResponse($data) {
      return $this->response = new TokenCancelResponse($this, $data);
  }

  public function getData() {
    $data = parent::getData();

    $data['token'] = $this->getToken();

    return $data;
  }

}
