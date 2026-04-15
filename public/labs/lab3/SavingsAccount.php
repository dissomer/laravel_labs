<?php
class SavingsAccount extends BankAccount {
    public static $interestRate = 15.5;  // https://bank.gov.ua/ua/monetary/archive-rish

    public function __construct($currency, $balance = 0) {
        parent::__construct($currency, $balance);
    }

    public function applyInterest() {
        $this->balance += $this->balance * self::$interestRate;
    }
}
?>
