<h3>
	<?= $caption ?? '' ?>
</h3>
<br>
<form method="post">
	<input type="text" name="login" placeholder="Логин" required>
	<input type="password" name="password" placeholder="Пароль" required>
	<input type="submit" name="button" value="Вход">
</form>