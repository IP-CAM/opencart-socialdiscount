Модуль Скидка за "Лайк" в соц сетях.
Автор: Gennady Telegin <support@itxd.ru>

Модуль предоставляет скидку пользователю на товар за нажатие на кнопку "Мне нравится" или "Рассказать друзьям" социальных сетях.
Для Opencart 1.5.x.

Список поддерживаемых соц сетей:
 * Вконтакте
 * Facebook
 * Google Plus
 * Мой Мир
 * Одноклассники
 * Twitter

Поддерживаются кнопки сервисов AddThis.com и Pluso.ru - скидка засчитывается сразу после клика на кнопку, без подтверждения из социальной сети.
 
Возможности настройки:
 * Скидка считается либо от основной цены, либо от цены по акции.
 * Выбор типа скидки - процент или фиксированная.
 * Скидка задается в целом для всех товаров и для каждого товара в отдельности.
 * Настраивается отдельное значение скидки для каждой соцсети и каждого действия (лайк или пост на стене).
 * К цене добавляется признак того, что скидка предоставлена за лайк. В админке можно задать, что именно выводить (может быть html с картинкой или прилипший div). Состояние признака обновляется динамически на странице.
 * Ограничение действия скидки по времени, например в одну неделю. По умолчанию без ограничения.
 
По всем вопросам установки, настройки, поддержки и изменений в модуле обращайтесь по support@itxd.ru

Для установки модуля:
1. Установить VQMod (https://code.google.com/p/vqmod/), если он не установлен.
Если его не установить, то изменения в файлах темы оформления, необходимые для работы данного модуля, нужно будет вносить вручную (описано ниже).

2. Скопируйте содержимое из папки "upload" на Ваш сервер.

3. Зайдите в администраторский интерфейс, перейдите в Дополнение->Учитывать в заказе->Скидка за лайк. Нажмите Установить, затем Изменить.

4. Задайте величину скидки за лайк или за шеринг в соответствующем поле. Нажимите сохранить.

4a. Если у вас тема Shoppica2, скопируйте также содержимое из папки shoppica2 на Ваш сервер. Это заменит один файл.

5. Теперь нужно установить кнопки социальных сетей в карточе товара. Сделать это можно несколькими способами способами:
  5a. С помощью Конструктора (дан пример для установки на default тему):
     1. Зайдите в админстраторский интерфейс, перейдите в Дополнение->Учитывать в заказе->Скидка за лайк->Изменить
	 2. Перейдите на вкладку Кнопки социальных сетей
	 3. На этой вкладке для каждой соц сети задается код кнопки, рядом дана инструкцию его получания. Для всех социальных сетей кроме Вконтакте уже задан код, можете его оставить.
	 4. Создайте код кнопки Вконтакте согласно инструкции рядом с соответстсвующим полем.
	 5. Нажмите Применить.
	 6. В файле catalog/view/theme/default/template/product/product.tpl, найдите строку <div id="share">. Внутри этого блока находится код AddThis - удалите этот блок вместе с его содержимым.
	 7. В том месте, где был <div id="share"></div> вставьте
			{SOCIAL_BUTTONS}
			
		получился код вроде
	       <div class="review">
             <div><img .....
			 {SOCIAL_BUTTONS}
		   </div>
	 8. Все, зайдите на ваш сайт - модуль работает.
  5b. Установить код Pluso или AddThis (установлен по умполчанию в default теме) и включить в настройках модуля их поддержку.
  5c. Самостоятельно, без конструктора:	 
     1. Предварительно установите кнопку "Мне нравится" на страницу карточки товара. Для этого:
	   * Вконтакте:
         a. Создайте код кнопки на странице http://vk.com/developers.php?p=Like
         b. Разместите его в нужном месте в файле product/product.tpl вашей темы оформления.
       * Facebook:  http://developers.facebook.com/docs/reference/plugins/like/, HTML5 вариант
       * Google Plus: https://developers.google.com/+/web/+1button/, в тег <g:plusone> добавьте атрибут callback="plusone_share", например:
            <g:plusone callback="plusone_share"></g:plusone>
	       Важно: согласно правилам Google (https://developers.google.com/+/web/buttons-policy) запрещено давать какие-либо ценности пользователю в обмен на нажатие кнопки +1. Включая эту опцию в данном модуле вы берете всю ответственность за этой действие на себя.	 
       * Мой Мир: http://api.mail.ru/sites/plugins/share/
       * Одноклассники: http://dev.odnoklassniki.ru/wiki/pages/viewpage.action?pageId=23167439
       * Twitter (https://twitter.com/about/resources/buttons#tweet, https://dev.twitter.com/docs/intents/events) ипользуйте следующий код кнопки:
			<a href="https://twitter.com/share" class="twitter-share-button" >Tweet</a>
			<script type="text/javascript" charset="utf-8">
			  window.twttr = (function (d,s,id) {
				var t, js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
				js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
				return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
			  }(document, "script", "twitter-wjs"));
			</script>

Модуль готов к работе.

Checkbox рядом с полем включает или выключает скидки для данных действий. Пользовательские действия всегда сохранаются, так что если выключить скидки и потом включить её включить - то пользователь вновь увидит положенную ему скидку.

Если возникли сложности или вопросы, то обращайтесь по support@itxd.ru
