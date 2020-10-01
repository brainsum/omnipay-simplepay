<?php

namespace Omnipay\SimplePay\Message;

/**
 * Abstract Request
 */
abstract class AbstractRequest  extends \Omnipay\Common\Message\AbstractRequest {

  const ENDPOINT_SANDBOX = "https://sandbox.simplepay.hu/payment/v2/";
  const ENDPOINT_LIVE    = "https://secure.simplepay.hu/payment/v2/";

  const HASH_ALGO = 'sha384';
  const SDK_VERSION = 'Omnipay-Simplepay-v0.1';

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

  public function getEndpoint() {
    return $this->getTestMode() ? self::ENDPOINT_SANDBOX : self::ENDPOINT_LIVE;
  }

  public function setLanguage($value) {
    return $this->setParameter('language', $value);
  }

  public function getLanguage() {
    return $this->getParameter('language');
  }

  public function setPaymentType($value) {
    return $this->setParameter('paymentType', $value);
  }

  public function getPaymentType() {
    return $this->getParameter('paymentType');
  }

  public function setTimeoutUrl($value) {
    return $this->setParameter('timeoutUrl', $value);
  }

  public function getTimeoutUrl() {
    return $this->getParameter('timeoutUrl');
  }

  public function setUrl($value) {
    return $this->setParameter('url', $value);
  }

  public function getUrl() {
    return $this->getParameter('url');
  }

  public function setUrls($value) {
    return $this->setParameter('urls', $value);
  }

  public function getUrls() {
    return $this->getParameter('urls');
  }

  public function setMethods($value) {
    return $this->setParameter('methods', $value);
  }

  public function getMethods() {
    return $this->getParameter('methods');
  }

  public function getHttpMethod() {
    return 'POST';
  }

  public function sendData($data) {
    $data_string = json_encode($data);

    $httpResponse = $this->httpClient->request(
      'POST',
      $this->getEndpoint(),
      [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Signature' => $this->getSignature($data_string)
      ],
      $data_string
    );

    $content = $httpResponse->getBody()->getContents();

    return $this->createResponse(json_decode($content, true));
  }

  protected function getSignature($dataString) {
    return base64_encode(hash_hmac(self::HASH_ALGO, $dataString, trim($this->getApiKey()), true));
  }

  public function getData() {

    $data = [
      'sdkVersion' => self::SDK_VERSION,
      'merchant' => $this->getMerchantId(),
    ];

    return $data;
  }

}
