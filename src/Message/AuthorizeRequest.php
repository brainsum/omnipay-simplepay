<?php

namespace Omnipay\SimplePay\Message;

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Authorize Request
 */
class AuthorizeRequest extends AbstractRequest {

  public function setRecurring($value) {
    return $this->setParameter('recurring', $value);
  }

  public function getRecurring() {
    return $this->getParameter('recurring');
  }

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

  public function getEndpoint() {
    return parent::getEndpoint() . 'start';
  }

  protected function createResponse($data) {
    return $this->response = new AuthorizeResponse($this, $data);
  }

  public function getData() {
    $data = parent::getData();

    $data['total'] = $this->getTotal();
    $data['currency'] = $this->getCurrency();
    $data['customerEmail'] = $this->getCustomerEmail();
    $data['orderRef'] = $this->getOrderRef();
    $data['recurring'] = $this->getRecurring();
    $data['language'] = $this->getLanguage();

    if ($this->getUrl()) {
      $data['url'] = $this->getUrl();
    } else {
      $data['urls'] = $this->getUrls();
    }

    return $data;
  }

}
