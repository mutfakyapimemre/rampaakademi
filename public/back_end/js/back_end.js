$(function(){
	$('[name="menu_add_type"]').change(function(){
		var menu_add_type = $(this).val();

		if (menu_add_type == 1){
			$('[name="menu_add_link_url"]').hide();
			$('[name="menu_add_link_page"]').show();
			$('[name="menu_add_link_page"]').focus();
		} else if (menu_add_type == 2){
			$('[name="menu_add_link_page"]').hide();
			$('[name="menu_add_link_url"]').show();
			$('[name="menu_add_link_url"]').focus();
		}
	})

	$('[name="menu_add_send"]').click(function(){
		var menu_add_type = $('[name="menu_add_type"]').val();

		if (menu_add_type == 1){
			var menu_add_link_page = $('[name="menu_add_link_page"]').val();

			if (menu_add_link_page == ''){
				alert('Lütfen menü linkini boş bırakmayın');
				$('[name="menu_add_link_page"]').focus();
				return false;
			}
		} else if (menu_add_type == 2){
			var menu_add_link_url = $('[name="menu_add_link_url"]').val();

			if (menu_add_link_url == ''){
				alert('Lütfen menü linkini boş bırakmayın');
				$('[name="menu_add_link_url"]').focus();
				return false;
			}
		}
	})


	$('[name="menu_edit_type"]').change(function(){
		var menu_edit_type = $(this).val();

		if (menu_edit_type == 1){
			$('[name="menu_edit_link_url"]').hide();
			$('[name="menu_edit_link_page"]').show();
			$('[name="menu_edit_link_page"]').focus();
		} else if (menu_edit_type == 2){
			$('[name="menu_edit_link_page"]').hide();
			$('[name="menu_edit_link_url"]').show();
			$('[name="menu_edit_link_url"]').focus();
		}
	})

	$('[name="menu_edit_send"]').click(function(){
		var menu_edit_type = $('[name="menu_edit_type"]').val();

		if (menu_edit_type == 1){
			var menu_edit_link_page = $('[name="menu_edit_link_page"]').val();

			if (menu_edit_link_page == ''){
				alert('Lütfen menü linkini boş bırakmayın');
				$('[name="menu_edit_link_page"]').focus();
				return false;
			}
		} else if (menu_edit_type == 2){
			var menu_edit_link_url = $('[name="menu_edit_link_url"]').val();

			if (menu_edit_link_url == ''){
				alert('Lütfen menü linkini boş bırakmayın');
				$('[name="menu_edit_link_url"]').focus();
				return false;
			}
		}
	})
})