Module: Social Discount
Author: Gennady Telegin <support@itxd.ru>

Module provides discount for users who make like or share in social network.

List of supported social networks:
 * Vkontakte.ru
 * Facebook
 * Google Plus
 * Mail.Ru
 * Odnoklassniki.ru
 * Twitter

Support buttons of AddThis.com and Pluso.ru services - discount is given to client immediately after click, without confirm from social network.
 
Setup options:
 * Discount can be calculated from main or special price.
 * Discount can be percent or fixed.
 * Discount is set for all products and can be specified for each product.
 * Discount value is specified for each social network and each action (like or share)
 * In template there are printed mark about social discount. It's appended to price and can be changed in admin.
 * Discount can be limited in time, for example to one week. No limits by default.
 
All questions about install, setup or support write to support@itxd.ru

To install module:
1. Install social network buttons at product page:
  a. Create VK button at http://vk.com/developers.php?p=Like
  b. Put it in product/product.tpl of your theme.

  For Facebook:  http://developers.facebook.com/docs/reference/plugins/like/, use XFBML variant
  For Google Plus: https://developers.google.com/+/web/+1button/, add attribute callback="plusone_share" to tag <g:plusone>, for example:
     <g:plusone callback="plusone_share"></g:plusone>
	 Important: according to Google policy (https://developers.google.com/+/web/buttons-policy), publisher may not direct users to click a Google+ button for prize. You use this option in your own risk.
  For Mail.Ru and Odnoklassniki.ru: http://api.mail.ru/sites/plugins/share/
  For Twitter (https://twitter.com/about/resources/buttons#tweet, https://dev.twitter.com/docs/intents/events) use this button code:
  
		<a href="https://twitter.com/share" class="twitter-share-button" >Tweet</a>
		<script type="text/javascript" charset="utf-8">
		  window.twttr = (function (d,s,id) {
			var t, js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
			js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
			return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
		  }(document, "script", "twitter-wjs"));
		</script>
  
2. Install VQMod (https://code.google.com/p/vqmod/), if you didn't this before:

3. Copy contents of "upload" to your server.

3.1 If you use Shoppica2 theme, copy contents of "shoppica2" to your server. It will replace one file.

4. Go to admin panel, Extensions->Order Totals->Social Discount. Press Install, then Edit.

5. Set discount value and press Save.
Checkbox near the social network mean enable/disable. User actions are always stored, so if you disable and then enable social network - all user's discounts will be restored.

If you have troubles or questions, write to support@itxd.ru