<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; padding: 20px; }
        .converter-form { background: #f9f9f9; padding: 20px; border-radius: 8px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        button { background: #4CAF50; color: white; border: none; padding: 12px 20px; border-radius: 4px; cursor: pointer; font-size: 16px; }
        button:hover { background: #45a049; }
        .error { color: #d32f2f; background: #ffcdd2; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
        .result { background: #e8f5e9; color: #2e7d32; padding: 15px; border-radius: 4px; margin-top: 20px; }
        .form-row { display: flex; gap: 10px; align-items: center; }
        .form-row > div { flex: 1; }
        .arrow { font-size: 24px; }
    </style>
</head>
<body>
<h1>Currency Converter</h1>

<div class="converter-form">
    <?php if (isset($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" id="amount" required
                   value="<?= isset($post['amount']) ? htmlspecialchars($post['amount']) : '' ?>">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="from">From:</label>
                <select name="from" id="from" required>
                    <option value="">-- Select currency --</option>
                    <?php foreach ($currencies as $code): ?>
                        <option value="<?= $code ?>"
                            <?= isset($post['from']) && $post['from'] === $code ? 'selected' : '' ?>>
                            <?= $code ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="arrow">→</div>

            <div class="form-group">
                <label for="to">To:</label>
                <select name="to" id="to" required>
                    <option value="">-- Select currency --</option>
                    <?php foreach ($currencies as $code): ?>
                        <option value="<?= $code ?>"
                            <?= isset($post['to']) && $post['to'] === $code ? 'selected' : '' ?>>
                            <?= $code ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <button type="submit">Convert</button>
    </form>
</div>

<?php if (isset($result)): ?>
    <div class="result">
        <h3>Conversion Result</h3>
        <p>
            <?= htmlspecialchars($result['amount']) ?>
            <?= htmlspecialchars($result['from']) ?> =git init
            <?= htmlspecialchars($result['converted']) ?>
            <?= htmlspecialchars($result['to']) ?>
        </p>
    </div>
<?php endif; ?>
</body>
</html>