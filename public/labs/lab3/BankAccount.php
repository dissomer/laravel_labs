<?php
class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0; 

    protected $balance;   
    protected $currency; 

    public function __construct($currency, $balance = 0) {
        if ($balance < self::MIN_BALANCE) {
            throw new Exception("Баланс не може бути меншим за " . self::MIN_BALANCE);
        }
        $this->balance = $balance;
        $this->currency = $currency;
    }

    public function deposit($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума поповнення повинна бути позитивною");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($amount <= 0) {
            throw new Exception("Сума зняття повинна бути позитивною");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance . " " . $this->currency;
    }
}
?>
