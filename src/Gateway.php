<?php

namespace Omnipay\SimplePay;

use Omnipay\Common\AbstractGateway;

/**
 * SimplePay Gateway
 */
class Gateway extends AbstractGateway {

  public function getName() {
    return 'SimplePay';
  }

  public function getDefaultParameters() {
    return array(
      'apiKey' => '',
      'merchantId' => '',
      'testMode' => false,
      'language' => 'HU',
      'methods' => [[
        'CARD'
      ]],
    );
  }

  public function getApiKey() {
    return $this->getParameter('apiKey');
  }

  public function setApiKey($value) {
    return $this->setParameter('apiKey', $value);
  }

  public function getMerchantId() {
    return $this->getParameter('merchantId');
  }

  public function setMerchantId($value) {
    return $this->setParameter('merchantId', $value);
  }

  public function purchase(array $parameters = []) {
    return $this->createRequest('\Omnipay\SimplePay\Message\AuthorizeRequest', $parameters);
  }

  public function completePurchase(array $parameters = []) {
    return $this->query($parameters);
  }

  public function query(array $parameters = []) {
    return $this->createRequest('\Omnipay\SimplePay\Message\QueryRequest', $parameters);
  }

}