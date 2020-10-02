<?php

namespace Omnipay\SimplePay\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * DoRecurring Request
 */
class DoRecurringRequest extends AbstractRequest {

  public function setTotal($value) {
    return $this->setParameter('total', $value);
  }

  public function getTotal() {
    return $this->getParameter('total');
  }

  public function setCustomerEmail($value) {
    return $this->setParameter('customerEmail', $value);
  }

  public function getCustomerEmail() {
    return $this->getParameter('customerEmail');
  }

  public function setOrderRef($value) {
    return $this->setParameter('orderRef', $value);
  }

  public function getOrderRef() {
    return $this->getParameter('orderRef');
  }

  public function setToken($value) {
    return $this->setParameter('token', $value);
  }

  public function getToken() {
    return $this->getParameter('token');
  }

  public function getEndpoint() {
    return parent::getEndpoint() . 'dorecurring';
  }

  protected function createResponse($data) {
    return $this->response = new DoRecurringResponse($this, $data);
  }

  public function getData() {
    $data = parent::getData();

    $data['total'] = $this->getTotal();
    $data['token'] = $this->getToken();
    $data['currency'] = $this->getCurrency();
    $data['customerEmail'] = $this->getCustomerEmail();
    $data['orderRef'] = $this->getOrderRef();
    $data['language'] = $this->getLanguage();

    return $data;
  }

}
