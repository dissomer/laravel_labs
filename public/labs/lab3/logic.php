<?php
require_once 'AccountInterface.php';
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

function handleRequest() {
    try {
        $type = $_POST['accountType'];
        $currency = $_POST['currency'];
        $initial = (float) $_POST['initial'];
        $deposit = isset($_POST['deposit']) ? (float) $_POST['deposit'] : 0;
        $withdraw = isset($_POST['withdraw']) ? (float) $_POST['withdraw'] : 0;
        $applyInterest = isset($_POST['applyInterest']);

        if ($type === 'savings') {
            $account = new SavingsAccount($currency, $initial);
            $result = "Накопичувальний рахунок створено.\n";
            if ($applyInterest) {
                $account->applyInterest();
                $result .= "Відсотки застосовано.\n";
            }
        } else {
            $account = new BankAccount($currency, $initial);
            $result = "Звичайний рахунок створено.\n";
        }

        if ($deposit > 0) {
            $account->deposit($deposit);
            $result .= "Поповнено на $deposit.\n";
        }

        if ($withdraw > 0) {
            $account->withdraw($withdraw);
            $result .= "Знято $withdraw.\n";
        }

        $result .= "Поточний баланс: " . $account->getBalance();

        return $result;
    } catch (Exception $e) {
        return "Помилка: " . $e->getMessage();
    }
}

$result = handleRequest();
header("Location: client.php?result=" . urlencode($result));
exit;
