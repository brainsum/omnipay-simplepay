<?php

namespace Omnipay\SimplePay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Query Response
 */
class QueryResponse extends AbstractResponse implements RedirectResponseInterface {

  public function __construct(RequestInterface $request, $data) {
    $this->request = $request;
    $this->data = $data;
  }

  public function isSuccessful() {
    $transaction_ids = $this->request->getData()['transactionIds'];

    $sucessful_transactions = array_filter($this->data['transactions'], function ($tr) use ($transaction_ids) {
      return in_array($tr['transactionId'], $transaction_ids) && $tr['status'] == 'AUTHORIZED';
    });

    return count($sucessful_transactions) == $this->data['totalCount'];
  }

  public function getTransactionIds() {
    return $this->request->getData()['transactionIds'];
  }

  public function isRedirect() {
    return false;
  }

  public function getRedirectData()
  {
      return null;
  }

}
