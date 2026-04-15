<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Банківський рахунок</title>
</head>
<body>
    <h1>Банківський рахунок</h1>
    <form action="logic.php" method="post">
        <p>
            <label>Тип рахунку:</label><br>
            <select name="accountType">
                <option value="bank">Звичайний рахунок</option>
                <option value="savings">Накопичувальний рахунок</option>
            </select>
        </p>

        <p>
            <label>Валюта:</label><br>
            <input type="text" name="currency" value="UAH" required>
        </p>

        <p>
            <label>Початковий баланс:</label><br>
            <input type="number" name="initial" step="0.01" required>
        </p>

        <p>
            <label>Сума для поповнення:</label><br>
            <input type="number" name="deposit" step="0.01">
        </p>

        <p>
            <label>Сума для зняття:</label><br>
            <input type="number" name="withdraw" step="0.01">
        </p>

        <p>
            <label>
                <input type="checkbox" name="applyInterest">
                Застосувати відсотки (тільки для накопичувального рахунку)
            </label>
        </p>

        <button type="submit">Виконати</button>
    </form>

    <?php if (isset($_GET['result'])): ?>
        <h2>Результат:</h2>
        <pre><?= htmlspecialchars($_GET['result']) ?></pre>
    <?php endif; ?>
</body>
</html>
