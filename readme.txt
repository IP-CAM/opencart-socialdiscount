Модуль Скидка за "Лайк" для ВКонтакте.
Автор: Gennady Telegin <support@itxd.ru>

Модуль предоставляет скидку пользователю на товар за нажатие на кнопку "Мне нравится" социально сети VK.

По всем вопросам установки, настройки, поддержки и изменений в модулей обращайтесь по support@itxd.ru

Для установки модуля:
1. Предварительно установите кнопку "Мне нравится" на страницу карточки товара. Для этого:
  a. Создайте код кнопки на странице http://vk.com/developers.php?p=Like
  b. Разместите его в нужном месте в файле product/product.tpl вашей темы оформления.

2. Желательно также установить VQMod (https://code.google.com/p/vqmod/).
Если его не установить, то изменения в файлах темы оформления, необходимые для работы данного модуля, нужно будет вносить вручную (описано ниже).

3. Скопируйте содержимое из папки "upload" на Ваш сервер.

4. Зайдите в администраторский интерфейс opencart, перейдите в Дополнение->Учитывать в заказе->Скидка за лайк. Нажмите Установить, затем Изменить.

5. Задайте величину скидки в соответствующем поле. Нажимите сохранить.

6. Если VQMod не установлен, то в файле product/product.tpl вашей темы оформления перед <?php echo $footer; ?> добавьте следующее:
<script>
VK.Observer.subscribe("widgets.like.liked", function () {
	sd_userLiked();
});

VK.Observer.subscribe("widgets.like.unliked", function () {
	sd_userUnliked();
});
function sd_userLiked() {
	var product_id = <?php echo $product_id; ?>;
	$.ajax({
		url: '/index.php?route=module/social_discount/like',
		type: 'POST',
		data: {
			"product_id": product_id
		}
	});
}

function sd_userUnliked() {
	var product_id = <?php echo $product_id; ?>;
	$.ajax({
		url: '/index.php?route=module/social_discount/unlike',
		type: 'POST',
		data: {
			"product_id": product_id
		}
	});
}
</script>

Модуль готов к работе.

Если возникли сложности или вопросы, то обращайтесь по support@itxd.ru