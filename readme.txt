������ ������ �� "����" ��� ���������.
�����: Gennady Telegin <support@itxd.ru>

������ ������������� ������ ������������ �� ����� �� ������� �� ������ "��� ��������" ��������� ���� VK.

�� ���� �������� ���������, ���������, ��������� � ��������� � ������� ����������� �� support@itxd.ru

��� ��������� ������:
1. �������������� ���������� ������ "��� ��������" �� �������� �������� ������. ��� �����:
  a. �������� ��� ������ �� �������� http://vk.com/developers.php?p=Like
  b. ���������� ��� � ������ ����� � ����� product/product.tpl ����� ���� ����������.

2. ���������� ����� ���������� VQMod (https://code.google.com/p/vqmod/).
���� ��� �� ����������, �� ��������� � ������ ���� ����������, ����������� ��� ������ ������� ������, ����� ����� ������� ������� (������� ����).

3. ���������� ���������� �� ����� "upload" �� ��� ������.

4. ������� � ����������������� ��������� opencart, ��������� � ����������->��������� � ������->������ �� ����. ������� ����������, ����� ��������.

5. ������� �������� ������ � ��������������� ����. �������� ���������.

6. ���� VQMod �� ����������, �� � ����� product/product.tpl ����� ���� ���������� ����� <?php echo $footer; ?> �������� ���������:
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

������ ����� � ������.

���� �������� ��������� ��� �������, �� ����������� �� support@itxd.ru