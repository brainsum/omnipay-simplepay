<?php

namespace Omnipay\SimplePay\Message;

/**
 * Query Request
 */
class QueryRequest extends AbstractRequest {

  public function setOrderRef($value) {
    return $this->setParameter('orderRef', $value);
  }

  public function getOrderRef() {
    return $this->getParameter('orderRef');
  }

  public function setTransactionId($value) {
    return $this->setParameter('transactionId', $value);
  }

  public function getTransactionId() {
    return $this->getParameter('transactionId');
  }

  public function getEndpoint() {
    return parent::getEndpoint() . 'query';
  }

  protected function createResponse($data) {
      return $this->response = new QueryResponse($this, $data);
  }

  public function getData() {
    $data = parent::getData();

    $data['transactionIds'] = [$this->getTransactionId()];

    return $data;
  }

  public function isSuccessful() {
    return true;
  }
}
